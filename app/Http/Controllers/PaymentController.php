<?php

namespace App\Http\Controllers;


use App\Models\Payments;
use App\Models\Plan;
use Carbon\Carbon;
use Log;
use Razorpay\Api\Api;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{
    public function createOrder(Request $request)
    {
        $request->validate([
            'amount' => 'required|integer|min:1',
            'type' => 'required|string',
            'currency' => 'required|string'
        ]);

        // 1. Fetch the plan by type only
        $plan = Plan::where('plan_type', $request->type)
            ->where('is_active', 1)
            ->first();

        if (!$plan) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid or inactive plan selected.',
            ], 400);
        }

        $expectedAmount = ($request->currency === 'INR') ? $plan->price_ind : $plan->price_usd;
        if ((int) $request->amount !== (int) $expectedAmount) {
            return response()->json(['success' => false, 'message' => 'Price mismatch detected. Transmission halted.'], 422);
        }
        $api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );
        try {
            // 1. Get the User ID safely
            $userId = auth()->id();

            $hasPaidBefore = Payments::where('user_id', $userId)
                ->whereIn('status', ['captured', 'success', 'paid']) // Cover all possible success strings
                ->exists();

            // 3. Prepare Order Data (Initialize WITHOUT offers first)
            $orderData = [
                'receipt' => 'rcpt_' . uniqid(),
                'amount' => $expectedAmount,
                'currency' => $request->currency,
                'notes' => [
                    'user_id' => $userId,
                    'plan_type' => $plan->plan_type,
                ],
            ];

            // 4. ONLY add the offer if they have NEVER paid before
            if (!$hasPaidBefore && $request->currency === 'INR') {
                $orderData['offers'] = ['offer_SXiD3hcLpVJzLO'];
            }
            // Temporary Log - Check your storage/logs/laravel.log
            Log::info("User ID: $userId | Has Paid Before: " . ($hasPaidBefore ? 'YES' : 'NO'));


            $order = $api->order->create($orderData);
        } catch (\Exception $e) {
            // This will help you see if Razorpay rejects the Offer ID in your logs
            Log::error('Razorpay Order Error: ' . $e->getMessage());
            return response()->json(['error' => 'Gateway Initialization Failed'], 500);
        }

        return response()->json([
            'success' => true,
            'order_id' => $order['id'],
            'amount' => $order['amount'],
            'currency' => $order['currency']
        ]);
    }

    public function verifyPayment(Request $request)
    {
        $request->validate([
            'razorpay_payment_id' => 'required|string',
            'razorpay_order_id' => 'required|string',
            'razorpay_signature' => 'required|string',
            'type' => 'required|string'
        ]);

        $api = new Api(
            config('services.razorpay.key'),
            config('services.razorpay.secret')
        );

        try {

            // 🔹 Verify signature
            $api->utility->verifyPaymentSignature([
                'razorpay_order_id' => $request->razorpay_order_id,
                'razorpay_payment_id' => $request->razorpay_payment_id,
                'razorpay_signature' => $request->razorpay_signature,
            ]);

            // 🔹 Fetch payment from Razorpay
            $paymentDetails = $api->payment->fetch($request->razorpay_payment_id);
            $paymentArray = $paymentDetails->toArray();

            Log::info('Razorpay Payment:', $paymentArray);

            // 🔹 Ensure payment is captured
            if (($paymentArray['status'] ?? '') !== 'captured') {
                return response()->json([
                    'success' => false,
                    'message' => 'Payment not captured.'
                ], 400);
            }

            // 🔹 Prevent duplicate payment crediting
            if (Payments::where('razorpay_payment_id', $paymentArray['id'])->exists()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Payment already processed.'
                ], 400);
            }

            // 🔹 Extract UPI ID safely
            $acquirerData = $paymentArray['acquirer_data'] ?? [];
            $upiTransactionId = $acquirerData['upi_transaction_id'] ?? null;

            $plan = Plan::where('plan_type', $request->type)
                ->where('is_active', 1)
                ->first();

            if (!$plan) {
                return response()->json([
                    'success' => false,
                    'message' => 'System Error: Plan not recognized.'
                ], 404);
            }
            // 🔹 Determine benefits
            $creditsAdded = (int) $plan->ai_credits;
            $pdfAdded = (int) $plan->pdf_credits;


            DB::transaction(function () use ($request, $paymentArray, $upiTransactionId, $creditsAdded, $pdfAdded) {

                $user = auth()->user();

                // 🔹 Save payment
                Payments::create([
                    'user_id' => $user->id,
                    'razorpay_payment_id' => $paymentArray['id'],
                    'razorpay_order_id' => $paymentArray['order_id'],
                    'razorpay_signature' => $request->razorpay_signature,
                    'plan_type' => $request->type,
                    'plan_name' => ucfirst(str_replace('_', ' ', $request->type)),
                    'credits_added' => $creditsAdded,
                    'pdf_added' => $pdfAdded,
                    'amount' => $paymentArray['amount'],
                    'currency' => $paymentArray['currency'],
                    'fee' => $paymentArray['fee'] ?? null,
                    'tax' => $paymentArray['tax'] ?? null,
                    'status' => $paymentArray['status'],
                    'method' => $paymentArray['method'] ?? null,
                    'international' => $paymentArray['international'] ?? false,
                    'upi_transaction_id' => $upiTransactionId,
                    'email' => $paymentArray['email'] ?? null,
                    'contact' => $paymentArray['contact'] ?? null,
                    'raw_response' => $paymentArray,
                    'payment_date' => isset($paymentArray['created_at'])
                        ? Carbon::createFromTimestamp($paymentArray['created_at'])
                        : now(),
                ]);

                // 🔹 Update user
                $user->increment('total_credits', $creditsAdded);
                if ($pdfAdded > 0) {
                    $user->increment('pdf_export_balance', $pdfAdded);
                }
                $user->is_premium = 1;
                $user->save();
            });
            $user = auth()->user();

            return response()->json([
                'success' => true,
                'message' => 'Payment verified successfully!',
                'pdf_total' => $user->pdf_export_balance,
                'pdf_used' => $user->pdf_exports_used,
                'pdf_credits' => $pdfAdded,
                'ai_credits' => $creditsAdded,
            ]);

        } catch (\Throwable $e) {

            Log::error('Payment verification failed: ' . $e->getMessage());

            return response()->json([
                'success' => false,
                'message' => 'Payment verification failed. Please contact support.'
            ], 500);
        }
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Query;
use App\Models\Service;
use App\Models\TechStack;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;
use App\Mail\VerifyEmailMail;
use Stevebauman\Location\Facades\Location;
use URL;
class HomeController extends Controller
{
    public function index()
    {

        return view('portfolio.home', );
    }
    public function fetchTechStack()
    {
        $category = request()->query('category');

        $query = TechStack::query();

        if ($category && $category !== 'all') {
            $query->where('category', $category);
        }
        $techStacks = $query->get();
        if ($techStacks->isEmpty()) {
            return response()->json(['message' => 'No tech stacks found'], 404);
        }
        return response()->json($techStacks);
    }


    public function Queries(Request $request)
    {
        if ($request->filled('website')) {
            return back()->with('error', 'Spam detected');
        }
        if (empty($request->input('cf-turnstile-response'))) {
            die("Verification required");
        }

        $token = $request->input('cf-turnstile-response');
        $secret = config('services.turnstile.secret_key');
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $_SERVER['REMOTE_ADDR'];
        $data = [
            'secret' => $secret,
            'response' => $token,
            'remoteip' => $ip
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://challenges.cloudflare.com/turnstile/v0/siteverify");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);
        if ($response === false) {
            return back()->with('error', 'Verification failed. Try again.');
        }
        $result = json_decode($response, true);

        if (!$result['success']) {
            die("Bot detected");
        }

        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'subject' => 'required|string|max:255',
                'budget' => 'required|string|max:255',
                'requirements' => 'nullable|string'
            ]);

            date_default_timezone_set('Asia/Kolkata');

            $text =
                "📩 NEW QUERY RECEIVED\n\n"
                . "👤 *Client Name*\n{$validated['name']}\n\n"
                . "📧 *Email Address*\n{$validated['email']}\n\n"
                . "📌 *Inquiry Type*\n{$validated['subject']}\n\n"
                . "💰 *Estimated Budget*\n{$validated['budget']}\n\n"
                . "📝 *Project Requirements*\n{$validated['requirements']}\n\n"
                . "🌐 *Source*\nmrPrabhat\n\n"
                . "⏰ *Received On*\n" . now()->format('d M Y, h:i A');

            $token = config('services.telegram.bot_token');
            $chat_id = config('services.telegram.chat_id');

            $response = Http::timeout(10)->post(
                "https://api.telegram.org/bot{$token}/sendMessage",
                [
                    'chat_id' => $chat_id,
                    'text' => $text,
                    'parse_mode' => 'Markdown'
                ]
            );

            if (!$response->successful()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Failed to send notification'
                ], 500);
            }
            // save to database
            Query::create([
                'name' => $validated['name'],
                'email' => $validated['email'],
                'type' => $validated['subject'],
                'budget' => $validated['budget'],
                'message' => $validated['requirements']
            ]);
            return response()->json([
                'status' => true,
                'message' => 'Query submitted successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Server error while submitting query'
            ], 500);
        }
    }
    public function viewResume()
    {
        return view('portfolio.resume');
    }
    public function downloadResume()
    {
        $filePath = public_path('files/PrabhatYadavResume.pdf');
        if (file_exists($filePath)) {
            return response()->download($filePath, 'PrabhatYadavResume.pdf', [
                'Content-Type' => 'application/pdf',
            ]);
        } else {
            return response()->json(['message' => 'File not found'], 404);
        }
    }
    public function signup()
    {
        return view('auth.signup');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ], [
            // Custom messages array
            'email.unique' => 'This email is already registered. Please use a different one or log in.',
            'email.required' => 'We need your email to transmit your access keys.',
            'password.min' => 'Security protocol requires at least 6 characters.',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => strtolower(trim($validated['email'])),
            'password' => Hash::make($validated['password']),
            'total_credits' => 5,
        ]);

        // Send verification email
        // event(new Registered($user));
         $user->sendEmailVerificationNotification();

        Auth::login($user);

        return redirect()->route('verification.notice')
            ->with('success', 'Account created successfully! Please verify your email.');
    }
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'remember' => ['nullable', 'boolean'],
        ]);

        $user = User::where('email', $validated['email'])->first();

        // 1️⃣ If user does not exist
        if (!$user) {
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ])->onlyInput('email');
        }

        // 2️⃣ If Google-only account (no password set)
        if (is_null($user->password) && !is_null($user->google_id)) {
            return back()->withErrors([
                'email' => 'This account was created using Other Method. Please sign in with it.',
            ])->onlyInput('email');
        }

        // 3️⃣ Check password manually
        if (!Hash::check($validated['password'], $user->password)) {
            return back()->withErrors([
                'email' => 'Invalid credentials.',
            ])->onlyInput('email');
        }

        // 4️⃣ Login
        Auth::login($user, $validated['remember'] ?? false);

        $request->session()->regenerate();

        return redirect()->intended(route('tools'))
            ->with('success', 'Logged in successfully!');
    }


       public function logout(Request $request)
    {
        auth()->logout();
        return redirect()->route('tools');
    }
    public function pricing()
    {
        // 1. Get the real IP or mock the Guwahati IP for local dev
        $ip = request()->ip();
        if (in_array($ip, ['127.0.0.1', '::1']) || str_starts_with($ip, '192.168.')) {
            $ip = '103.115.197.10'; // Guwahati, Assam static IP
        }

        // 2. Location Detection
        $location = Location::get($ip);
        $isIndia = ($location && $location->countryCode === 'IN');

        // Pulling specific plan records from the collection passed by your Controller
        $starter = Plan::where('plan_type', 'starter')->first();
        $pdf = Plan::where('plan_type', 'pdf_bundle')->first();
        $pro = Plan::where('plan_type', 'bundle_pro')->first();
$isIndia = 'IN';
        // 4. Return View with Data
        return view('resumebuilder.pricing', compact('starter', 'pdf', 'pro', 'isIndia'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUserMail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\ValidationException;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;
use Mail;

class AuthController extends Controller
{

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {

                // If user exists but google_id not set → link account
                if (!$user->google_id) {
                    $user->update([
                        'google_id' => $googleUser->getId(),
                    ]);
                }

            } else {

                // Create completely new user
                $user = User::create([
                    'name' => $googleUser->getName(),
                    'email' => $googleUser->getEmail(),
                    'google_id' => $googleUser->getId(),
                    'email_verified_at' => now(),
                    'avatar' => $googleUser->getAvatar(),
                    'password' => null, // keep nullable
                    'total_credits' => 5,
                ]);
                Mail::to($user->email)->send(new WelcomeUserMail($user));
            }

            Auth::login($user);

            return redirect()->route('tools')
                ->with('success', 'Logged in successfully with Google!');

        } catch (\Exception $e) {

            return redirect()->route('login')
                ->with('error', 'Google login failed. Please try again.');
        }
    }

    public function auth_check()
    {
        if (auth()->check()) {
            return response()->json([
                'success' => true,
                'is_login' => true,
                // Optional: helpful for UI updates
            ]);
        }

        return response()->json([
            'success' => false,
            'is_login' => false,
            'message' => 'Session expired'
        ], 401); // 401 Unauthorized is the standard status code for this
    }
    public function password_change(Request $request)
    {
        try {
            // 1. Validate the Request
            $request->validate([
                // Checks if the input matches the user's actual password
                'current_password' => ['required', 'current_password'],

                // Checks if 'new_password' matches 'new_password_confirmation'
                'new_password' => ['required', 'confirmed', 'min:8', 'different:current_password'],
            ], [
                // Custom Error Messages
                'current_password.current_password' => 'The old password you entered is incorrect.',
                'new_password.different' => 'The new password must be different from the current one.',
                'new_password.confirmed' => 'The password confirmation does not match.',
            ]);

            // 2. Update the Password
            auth()->user()->update([
                'password' => Hash::make($request->new_password)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'PASSWORD UPDATED SUCCESSFULLY'
            ], 200);

        } catch (ValidationException $e) {
            // 3. Handle Validation Errors (422)
            return response()->json([
                'success' => false,
                'message' => $e->validator->errors()->first(),
                'errors' => $e->validator->errors()
            ], 422);

        } catch (\Exception $e) {
            // 4. Handle General System Errors (500)
            return response()->json([
                'success' => false,
                'message' => 'An unexpected error occurred. Please try again.'
            ], 500);
        }
    }



    public function send_reset_password(Request $request)
    {

        // 🪤 Honeypot
        if ($request->filled('website')) {
            return back()->with('error', 'Spam detected');
        }

        // 🔐 Turnstile check
        $token = $request->input('cf-turnstile-response');

        if (!$token) {
            return back()->with('error', 'Verification required');
        }

        $secret = config('services.turnstile.secret_key');
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $request->ip();
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

        $result = json_decode($response, true);

        if (!isset($result['success']) || !$result['success']) {
            return back()->with('error', 'Bot detected');
        }

        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return redirect()->route('password.sent')->with('email', $request->email);
        }

        // Force a single string error message
        return back()->withErrors([
            'error' => __($status)
        ]);
    }
    public function handle_password_update(Request $request)
    {
        // 🪤 Honeypot
        if ($request->filled('website')) {
            return back();
        }

        // 🔐 Turnstile check
        $token = $request->input('cf-turnstile-response');

        if (!$token) {
            return back()->with('error', 'Verification required');
        }

        $secret = config('services.turnstile.secret_key');
        $ip = $_SERVER['HTTP_CF_CONNECTING_IP'] ?? $request->ip();

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

        $result = json_decode($response, true);

        if (!isset($result['success']) || !$result['success']) {
            return back()->with('error', 'Bot detected');
        }

        // 🔐 Strong validation
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', \Illuminate\Validation\Rules\Password::min(8)->mixedCase()->numbers()],
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user) use ($request) {
                $user->password = Hash::make($request->password);
                $user->save();
            }
        );

        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->with('success', 'Password reset successfully!')
            : back()->withErrors(['email' => __($status)]);
    }
    public function resend_verification_email(Request $request)
    {
        $user = $request->user();
        // 🪤 Honeypot (optional if using form)
        if ($request->filled('website')) {
            return back();
        }
        // ✅ Already verified
        if ($user->hasVerifiedEmail()) {
            return redirect()->intended(route('tools'))
                ->with('success', 'Your email is already verified!');
        }

        // 🔐 Send verification mail
        $user->sendEmailVerificationNotification();

        $user->save();

        return redirect()->route('verification.dispatched')
            ->with('success', 'SYSTEM_DISPATCH: New access key transmitted.');
    }
    public function handle_email_verification(EmailVerificationRequest $request)
    {
        $user = $request->user();
        // 1. Guard Clause: If already verified, just redirect. 
        // This prevents sending duplicate Welcome Emails if they click the link twice.
        if ($user->hasVerifiedEmail()) {
            return redirect()->route('tools');
        }
        // 2. Mark the user as verified in the DB
        $request->fulfill();
        // 3. Award the 5 Smart Credits (Full Stack Logic)
        $user->increment('total_credits', 5);
        // 4. Send the Transactional Neon Welcome Email via ZeptoMail
        Mail::to($user->email)->send(new WelcomeUserMail($user));
        return redirect()->route('tools')
            ->with('success', 'Identity Confirmed. 5 Smart Credits have been added to your terminal.');
    }
}

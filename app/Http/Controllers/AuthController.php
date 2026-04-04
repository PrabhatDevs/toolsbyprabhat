<?php

namespace App\Http\Controllers;

use App\Mail\WelcomeUserMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JsonAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // 1. Check Authentication
        if (!auth()->check()) {
            return response()->json([
                'success' => false,
                'is_login' => false,
                'status' => 'unauthenticated',
                'message' => 'Please login to continue.'
            ], 401);
        }

        // 2. Check Email Verification
        // Assuming your User model implements MustVerifyEmail
        if (!auth()->user()->hasVerifiedEmail()) {
            return response()->json([
                'success' => false,
                'is_login' => true,
                'status' => 'unverified',
                'message' => 'Your email address is not verified.'
            ], 403); // 403 Forbidden is the standard code for unverified access
        }

        return $next($request);
    }
}

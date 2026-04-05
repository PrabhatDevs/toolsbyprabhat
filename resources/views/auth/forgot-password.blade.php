@extends('layouts.app')

@section('content')
    <style>
        .form_email::placeholder {
            color: #505050;
        }
    </style>
    <div id="toast-container"></div>
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">

        <div class="col-lg-5 col-md-7">

            <div class="cyber-card p-5">

                <!-- Heading -->
                <div class="text-center mb-4">
                    <h2 class="gradient-text">Forgot Password ?</h2>

                    <p class="text-secondary small">
                        Enter your email to receive a password reset link.
                    </p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('password.email') }}" id="forgot-password">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control cyber-input form_email"
                            placeholder="Email Address" required>
                    </div>
                    <!-- 🔐 Turnstile -->
                    <div class="mb-3">
                        <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                    </div>

                    <!-- 🪤 Honeypot -->
                    <input type="text" name="website" style="display:none">
                    <!-- Sign In Button -->
                    <button type="submit" class="btn btn-neon w-100 mb-3">
                        🔐 Send Password Reset Link
                    </button>
                </form>

                <script>
                    // Optional: Add client-side validation or interactivity here
                    document.getElementById('forgot-password').addEventListener('submit', function() {
                        // You can add a loading state or disable the button to prevent multiple submissions
                        this.querySelector('button[type="submit"]').disabled = true;
                    });
                </script>
                <!-- Additional Links -->
                <div class="text-center">
                    <a href="{{ route('login') }}" class="text-info text-decoration-none fw-bold">
                        Back to Login
                    </a>
                </div>

            </div>

        </div>

    </div>
@endsection

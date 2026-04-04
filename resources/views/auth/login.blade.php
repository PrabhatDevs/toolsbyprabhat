@extends('layouts.auth')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">

        <div class="col-lg-5 col-md-7">

            <div class="cyber-card p-5 py-2">

                <!-- Heading -->
                <div class="text-center mb-4">
                    <div class="logo-container mb-3">
                        <a href="/">
                            <img src="{{ asset('images/icons/mrprabhat-logo.png') }}" width="100" alt="Mr Prabhat"
                                class="auth-logo">
                        </a>
                    </div>

                    <h2 class="gradient-text fw-bold">Welcome Back</h2>
                    <p class="text-secondary small">
                        Sign in to continue building AI-powered resumes.
                    </p>
                </div>
                <!-- Login Form -->
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control cyber-input" placeholder="Email Address"
                            required>
                    </div>

                    <!-- Password -->
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control cyber-input" placeholder="Password"
                            required>
                    </div>

                    <!-- Remember + Forgot -->
                    <div class="d-flex justify-content-between align-items-center mb-4 small">
                        <div>
                            <input type="checkbox" name="remember" class="form-check-input me-1">
                            <span class="text-secondary">Remember me</span>
                        </div>

                        <a href="{{ route('password.request') }}" class="text-info text-decoration-none">
                            Forgot Password?
                        </a>
                    </div>

                    <!-- Sign In Button -->
                    <button type="submit" class="btn btn-neon w-100">
                        🔐 Sign In
                    </button>

                </form>

                <!-- Divider -->
                <div class="text-center my-3">
                    <span class="text-secondary small">OR</span>
                </div>

                <!-- Google Sign In -->
                <a href="{{ route('google.login') }}"
                    class="btn btn-outline-light w-100 d-flex align-items-center justify-content-center">

                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="18" class="me-2">

                    Sign in with Google
                </a>

                <!-- Signup Link -->
                <div class="text-center mt-4 small">
                    <span class="text-secondary">Don’t have an account?</span>
                    <a href="{{ route('signup') }}" class="gradient-text text-decoration-none">
                        Create Account
                    </a>
                </div>

            </div>

        </div>

    </div>
@endsection

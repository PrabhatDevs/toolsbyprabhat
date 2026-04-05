@extends('layouts.auth')

@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">

        <div class="col-lg-5 col-md-7">

            <div class="cyber-card p-5 py-2">

                <div class="text-center mb-4">
                    <div class="logo-container mb-3">
                        <a href="/">
                            <img src="{{ asset('images/icons/mrprabhat-logo.png') }}" width="100" alt="Mr Prabhat"
                                class="auth-logo">
                        </a>
                    </div>

                    <h2 class="gradient-text fw-bold">Create Account</h2>
                    <p class="text-secondary small">
                        Sign Up to continue building AI-powered resumes.
                    </p>
                </div>

                <form method="POST" action="{{ route('signup.submit') }}" id="signupForm">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <input type="text" name="name" class="form-control cyber-input" placeholder="Full Name"
                            required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <input type="email" name="email" class="form-control cyber-input" placeholder="Email Address"
                            required>
                    </div>


                    <!-- Password -->
                    <div class="mb-3 position-relative">
                        <input type="password" name="password" class="form-control cyber-input password-field"
                            placeholder="Password" required>

                        <span class="toggle-password">
                            👁
                        </span>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4 position-relative">
                        <input type="password" name="password_confirmation" class="form-control cyber-input password-field"
                            placeholder="Confirm Password" required>

                        <span class="toggle-password">
                            👁
                        </span>
                    </div>



                    <!-- Submit -->
                    <button type="submit" class="btn btn-neon w-100">
                        🚀 Sign Up
                    </button>
                </form>

                <div class="text-center my-3">
                    <span class="text-secondary small">OR</span>
                </div>
                <!-- Google Sign In -->
                <a href="{{ route('google.login') }}"
                    class="btn btn-outline-light w-100 my-2 d-flex align-items-center justify-content-center">

                    <img src="https://www.svgrepo.com/show/475656/google-color.svg" width="18" class="me-2">
                    Sign in with Google
                </a>

                <div class="my-3 text-center">
                    <p class="text-secondary mb-0" style="font-size: 0.75rem; opacity: 0.7;">
                        By continuing, you agree to our
                        <a href="{{ route('terms') }}"
                            class="text-info text-decoration-none border-bottom border-info">Terms of Service</a>
                        and acknowledge our
                        <a href="{{ route('privacy') }}"
                            class="text-info text-decoration-none border-bottom border-info">Privacy Policy</a>.
                    </p>
                </div>
                <div class="text-center mt-4 small">
                    <span class="text-secondary">Already have an account?</span>
                    <a href="{{ route('login') }}" class="gradient-text text-decoration-none">
                        Login
                    </a>
                </div>


            </div>

        </div>

    </div>
@endsection

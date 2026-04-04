@extends('layouts.app')

@section('content')
<style>
    .form_email::placeholder{
        color: #505050;
    }
 .cyber-input::placeholder {
    color: #505050;
    opacity: 1;
}
</style>
<div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">

   <div class="col-lg-5 col-md-7">

    <div class="cyber-card p-5">

        <!-- Heading -->
        <div class="text-center mb-4">
            <h2 class="gradient-text">Reset Password</h2>
            <h2 class="gradient-text">You're Almost There!</h2>
            <p class="text-secondary small">
                Enter your new password below to secure your account.
            </p>
        </div>

        <!-- Reset Form -->
        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Hidden Token -->
            <input type="hidden" name="token" value="{{ $token }}">

            <!-- Email -->
            <div class="mb-3">
                <input type="email"
                       name="email"
                       value="{{ request()->email }}"
                       class="form-control cyber-input"
                       placeholder="Email Address"
                       required>
            </div>

            <!-- New Password -->
            <div class="mb-3 position-relative">
                <input type="password"
                       name="password"
                       class="form-control cyber-input"
                       placeholder="New Password"
                       required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-4 position-relative">
                <input type="password"
                       name="password_confirmation"
                       class="form-control cyber-input"
                       placeholder="Confirm Password"
                       required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-neon w-100 mb-3">
                🔄 Reset Password
            </button>

        </form>

    </div>

</div>

</div>

@endsection
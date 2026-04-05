@extends('layouts.auth')
@section('content')
    <div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">

        <div class="col-lg-5 col-md-7">

            <div class="cyber-card p-5 text-center">

                <h2 class="gradient-text mb-3">Verify Your Email</h2>
                <p class="text-secondary small mb-4">
                    A verification link has been sent to your email address. Please check your inbox and click the link to
                    verify your account.
                </p>

                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <!-- 🔐 Turnstile -->
                    <div class="mb-3">
                        <div class="cf-turnstile" data-sitekey="{{ config('services.turnstile.site_key') }}"></div>
                    </div>

                    <!-- 🪤 Honeypot -->
                    <input type="text" name="website" style="display:none">
                    <button type="submit" class="btn btn-neon w-100 mb-3">
                        🔄 Resend Verification Email
                    </button>
                </form>

                <a href="{{ route('login') }}" class="text-info text-decoration-none">
                    Back to Login
                </a>
            </div>
        </div>
    </div>

    <script>
        function showToast(status, message) {

            const container = document.getElementById('toast-container');
            if (!container) return;

            const toast = document.createElement('div');
            toast.className = 'toast ' + status;
            toast.innerHTML = message;

            container.appendChild(toast);

            // Force reflow to trigger animation
            void toast.offsetWidth;

            toast.classList.add('show');

            // Hide after 4 seconds
            setTimeout(() => {
                toast.classList.remove('show');
                toast.classList.add('hide');

                toast.addEventListener('transitionend', () => {
                    toast.remove();
                }, {
                    once: true
                });

            }, 4000);
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            @if (session('success'))
                showToast("success", "{{ session('success') }}");
            @endif

            @if (session('error'))
                showToast("error", "{{ session('error') }}");
            @endif

            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    showToast("error", "{{ $error }}");
                @endforeach
            @endif
        });
    </script>
@endsection

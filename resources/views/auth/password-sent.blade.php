@extends('layouts.auth')

@section('content')


<div class="container d-flex align-items-center justify-content-center" style="min-height: 90vh;">
    <div class="col-lg-5 col-md-7">
        <div class="cyber-card p-5 text-center">
            
            <div class="mb-4">
                <div class="transmission-circle">
                    <i class='bx bx-check text-neon' style="font-size: 4rem;"></i>
                </div>
            </div>

            <h2 class="gradient-text mb-3">Password Reset Email Sent!</h2>
            
            <p class="text-secondary small mb-4">
                A password reset link has been sent to:<br>
                <span class="text-info fw-bold">{{ session('email') }}</span>
            </p>

            <div class="alert bg-dark border-info border-opacity-25 text-info small mb-4 py-2">
                <i class='bx bx-time-five me-1'></i> The link expires in 60 minutes.
            </div>

            <p class="text-secondary tiny mb-4" style="font-size: 0.75rem;">
                If you don't see the email within 2 minutes, please check your Spam folder.
            </p>

           <div class="d-grid gap-2">
                <a href="{{ route('login') }}" class="btn btn-outline-info w-100 py-2 border-opacity-25">
                    <i class='bx bx-log-in-circle me-1'></i> Return to Login
                </a>
                
                <hr class="border-secondary opacity-25 my-2">
                
                <p class="small text-secondary mb-0">
                    Data not received? 
                    <a href="{{ route('password.request') }}" class="text-info text-decoration-none fw-bold">RE-INITIATE</a>
                </p>
            </div>

        </div>
    </div>
</div>
<style>
    /* Add a pulsing effect to the icon container to make it feel "active" */
    .transmission-circle {
        width: 100px;
        height: 100px;
        background: rgba(0, 242, 255, 0.05);
        border: 1px solid rgba(0, 242, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        animation: pulse-border 2s infinite;
    }

    @keyframes pulse-border {
        0% { box-shadow: 0 0 0 0 rgba(0, 242, 255, 0.4); }
        70% { box-shadow: 0 0 0 15px rgba(0, 242, 255, 0); }
        100% { box-shadow: 0 0 0 0 rgba(0, 242, 255, 0); }
    }

    .text-neon {
        color: #00f2ff;
        text-shadow: 0 0 10px rgba(0, 242, 255, 0.5);
    }
</style>

@endsection
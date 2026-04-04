@extends('layouts.app')

@section('content')

<section class="py-5" style="background:;">
    <div class="container py-5">

        <!-- Page Title -->
        <div class="text-center mb-5">
            <h2 class="fw-bold text-white">Tech Insights & Development Logs</h2>
            <p class="text-secondary">
                Thoughts on backend engineering, APIs, system architecture, and real-world development.
            </p>
        </div>

        <div class="row g-4">

            <!-- Blog 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="cyber-card h-100 p-4 d-flex flex-column">
                    <small class="text-secondary mb-2">20 Feb 2026</small>
                    <h5 class="fw-bold text-info mb-3">
                        Building Secure Authentication in Core PHP
                    </h5>
                    <p class="text-secondary small flex-grow-1">
                        A deep dive into session handling, CSRF protection, password hashing,
                        and building secure login systems without relying entirely on frameworks.
                    </p>
                    <a href="{{ route('blogs.show','building-secure-authentication-in-core-php') }}" class="btn btn-neon btn-sm mt-3 align-self-start">
                        Read More →
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>

@endsection
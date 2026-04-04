@extends('layouts.app')
@section('title', 'Free Online Developer & PDF Tools | ' . $appname)
@section('meta_description', 'Access a suite of professional web utilities by Prabhat Yadav. Fast, secure, and easy-to-use tools for PDF management, and developer productivity.')
@section('meta_keywords', 'online utilities, developer tools, pdf converter, web tools, productivity apps, laravel developer tools, free online software')
@section('content')

<div class="container py-5">

    <!-- Page Header -->
    <div class="text-center mb-5">
        <h1 class="hero-title gradient-text pb-3">Developer Tools Hub</h1>
        <p class="text-secondary mt-3">
            Smart utilities built with Laravel & AI to solve real-world problems.
        </p>
    </div>

    <div class="row g-4">

        <!-- AI Resume Builder -->
        <div class="col-md-6">
            <div class="cyber-card p-5 h-100 position-relative">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="gradient-text mb-0">🤖 AI Resume Builder</h4>
                    <span class="status-badge status-live">
                        Live
                    </span>
                </div>

                <p class="text-secondary">
                    Generate ATS-friendly resumes powered by Open AI.
                    Automatically create professional summaries, optimize bullet points,
                    and tailor resumes based on job descriptions.
                </p>

                <div class="mt-4">
                    <span class="tech-pill me-2">Laravel</span>
                    <span class="tech-pill me-2">OpenAI API</span>
                    <span class="tech-pill me-2">AJAX</span>
                    <span class="tech-pill">PDF Export</span>
                </div>

                <div class="mt-4">
                    <a href="{{ route('tools.resume.index') }}" class="btn btn-neon">
                        Launch Tool →
                    </a>
                </div>

            </div>
        </div>

        <!-- Invoice Generator -->
        <div class="col-md-6">
            <div class="cyber-card p-5 h-100 position-relative">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="gradient-text mb-0">🧾 Invoice Generator</h4>
                    <span class="status-badge status-dev">
                        In Development
                    </span>
                </div>

                <p class="text-secondary">
                    Create professional invoices instantly.
                    Add client details, tax calculations, payment terms,
                    and export as PDF for business use.
                </p>

                <div class="mt-4">
                    <span class="tech-pill me-2">Laravel</span>
                    <span class="tech-pill me-2">DOMPDF</span>
                    <span class="tech-pill me-2">Dynamic Forms</span>
                    <span class="tech-pill">Tax Logic</span>
                </div>

                <div class="mt-4">
                    <a href="#" class="btn btn-neon disabled">
                        Coming Soon
                    </a>
                </div>

            </div>
        </div>

    </div>

</div>

@endsection
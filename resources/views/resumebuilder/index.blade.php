@extends('layouts.resume_header')
{{-- 1. Descriptive Title: Focus on the "Collection" --}}
{{-- 1. Title: Target 'Free', 'AI', and 'ATS-friendly' --}}
@section('title', 'Free AI Resume Builder | Create ATS-Friendly CVs in Minutes | ' . config('app.name'))
{{-- 2. Meta Description: Focus on 'No Login' or 'Instant' if applicable --}}
@section('meta_description', 'Build a professional, ATS-friendly resume for free with our AI-powered builder. Get AI content suggestions, ATS Score Checker, and download your CV as PDF instantly.')
{{-- 3. Keywords: Focus on intent-based long-tail keywords --}}
@section('meta_keywords', 'AI resume builder, free CV maker, ATS friendly resume, professional resume templates, AI cover letter generator, online resume builder, developer resume maker, ' . config('app.name'))
@section('content')
    <style>
        .template-card {
            overflow: hidden;
            border-radius: 12px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .template-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 15px 35px rgba(0, 255, 255, 0.2);
        }

        .template-card img {
            width: 100%;
            display: block;
        }

        .template-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(15, 23, 42, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 12px;
        }

        .template-card:hover .template-overlay {
            opacity: 1;
        }

        .template-title h6 {
            font-weight: 600;
        }

        .template-scroll-wrapper {
            display: flex;
            gap: 25px;
            overflow-x: auto;
            padding: 50px;
            scroll-snap-type: x mandatory;
        }

        /* Hide scrollbar */
        .template-scroll-wrapper::-webkit-scrollbar {
            display: none;
        }

        .template-scroll-wrapper {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .template-card {
            min-width: 300px;
            flex: 0 0 auto;
            scroll-snap-align: start;
            border-radius: 12px;
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .template-card img {
            width: 100%;
            height: 420px;
            object-fit: cover;
            border-radius: 12px;
        }

        .template-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 40px rgba(0, 255, 255, 0.2);
        }

        .template-overlay {
            position: absolute;
            inset: 0;
            background: rgba(15, 23, 42, 0.85);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .template-card:hover .template-overlay {
            opacity: 1;
        }

        .scroll-btn {
            position: absolute;
            top: 55%;
            transform: translateY(-50%);
            background: rgba(15, 23, 42, 0.9);
            border: none;
            color: #00ffff;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            font-size: 22px;
            cursor: pointer;
            z-index: 10;
            display: none;
            transition: 0.3s ease;
        }

        .scroll-btn:hover {
            background: #00ffff;
            color: #000;
        }

        .scroll-left {
            left: -10px;
        }

        .scroll-right {
            right: -10px;
        }
    </style>
    <div class="container py-5 py-md-5 ">

        <!-- HERO SECTION -->
        <div class="row align-items-center d-lg-flex p-2 py-md-5">

            <div class="col-lg-6">
                <h1 class="hero-title gradient-text">
                    AI Resume Builder
                </h1>

                <p class="text-secondary mt-4">
                    Build powerful, ATS-friendly resumes in seconds using advanced AI technology.
                    Automatically generate professional summaries, optimize bullet points,
                    and tailor your resume to match job descriptions.
                </p>

                <div class="mt-5">
                     <a href="{{ route('tools.resume.builder', ['template' => $template_slug, 't' => Crypt::encrypt($template_id)]) }}"
                        class="btn bg-info btn-neon text-dark">
                        Build Resume Now →
                    </a>
                    <span class="status-badge status-live ms-3">
                        AI Powered
                    </span>
                </div>
            </div>

            <div class="col-lg-6 mt-4 mt-lg-0 d-none d-lg-block">
                <div class="cyber-terminal">
                    <p class="code-font text-info mb-2">> Generating professional summary...</p>
                    <p class="code-font text-light">
                        Results-driven Full Stack Developer with 3+ years of experience
                        in scalable web architecture, RESTful APIs, authentication systems,
                        and secure payment gateway integration.
                    </p>
                    <p class="code-font text-success mt-3">✔ Resume optimized for ATS systems</p>
                </div>
            </div>

        </div>

        <!-- FEATURES SECTION -->
        <div class="mb-5 py-5">
            <div class="text-center mb-5 position-relative">
                <div class="mb-3">
                    <span class="text-info text-uppercase tracking-widest small fw-bold" style="letter-spacing: 0.3rem;">
                        ⚡ The Gold Standard
                    </span>
                </div>

                <h2 class="display-5 gradient-text fw-bold mb-4">Engineered for Your Selection</h2>

                <div class="mx-auto" style="">
                    <p class="text-secondary lead mb-4" style="line-height: 1.8;">
                        Think of this not just as a resume, but as your
                        <span class="text-white fw-bold border-bottom border-info border-opacity-25">personal career
                            launchpad</span>.
                        By using the same <span class="text-info fw-semibold">#1 Rated ATS templates</span> trusted by top
                        professionals, we ensure your profile doesn't just bypass automated filters—it commands the
                        recruiter's attention.
                    </p>

                    <div
                        class="p-4 rounded-4 border border-white border-opacity-10 bg-transparent bg-opacity-5 backdrop-blur shadow-lg">
                        <p class="mb-0 text-secondary">
                            <span class="text-white fw-bold">The best part?</span> For the price of a
                            <span class="text-info fw-bold px-2 py-1 bg-info bg-opacity-10 rounded">packet of
                                biscuits</span>,
                            you’re investing in a perfectly crafted resume that could land you your dream job.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-md-12">
                    <div class="cyber-card p-5 border-gradient-info">
                        <div class="row align-items-center">
                            <div class="col-md-8">
                                <h4 class="text-white mb-3">The <span class="fw-bold"> "First Impression Guarantee"</span>
                                </h4>
                                <p class="text-secondary mb-0">
                                    While no one can control a recruiter's final decision, we guarantee your resume will be
                                    100% ATS-optimized. By using our industry-leading templates, you are mathematically
                                    increasing your interview callback probability by up to <span
                                        class="text-info fw-bold">85%</span>. For the price of a packet of biscuits, you’re
                                    giving yourself the best possible shot at your dream job.

                                </p>
                            </div>
                            <div class="col-md-4 text-center">
                                <div class="status-badge status-live px-4 py-3">
                                    <i class='bx bxs-check-shield'></i> JOB-READY GUARANTEED
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-5">
            <div class="text-center mb-5">
                <h3 class="gradient-text">Precision Workflow</h3>
                <p class="text-secondary mt-2">Three steps from application to offer letter.</p>
            </div>


            <div class="row g-4 mb-5">
                <div class="col-md-4">
                    <div class="cyber-card p-4 h-100 text-center bg-soft-dark">
                        <div class="display-6 text-info mb-3"><i class='bx bx-edit-alt'></i></div>
                        <h5 class="text-white">1. Input Details</h5>
                        <p class="small text-secondary">Fill in your experience. No fancy formatting needed—just your raw
                            professional data.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="cyber-card p-4 h-100 text-center border-info border-1">
                        <div class="display-6 text-gradient-info mb-3"><i class='bx bx-chip'></i></div>
                        <h5 class="gradient-text">2. AI Optimization</h5>
                        <p class="small text-secondary">Our AI re-engineers your bullet points using the #1 Rated
                            ATS-Dominant Template for maximum impact.</p>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="cyber-card p-4 h-100 text-center  bg-soft-dark">
                        <div class="display-6 text-info mb-3"><i class='bx bx-rocket'></i></div>
                        <h5 class="text-white">3. Deploy & Land</h5>
                        <p class="small text-secondary">Export your recruiter-ready PDF for the price of a biscuit packet
                            and start getting callbacks.</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- CTA SECTION -->
        <div class="text-center mt-5">
            <div class=" p-5">

                <h3 class="gradient-text mb-3">
                    Ready to Build Your Resume?
                </h3>

                <p class="text-secondary">
                    Generate a job-ready resume in under 2 minutes.
                </p>

                <div class="mt-4">
                    <a href="{{ route('tools.resume.builder', ['template' => $template_slug, 't' => Crypt::encrypt($template_id)]) }}"
                        class="btn bg-info btn-neon text-dark">
                        Build Resume Now →
                    </a>
                </div>

            </div>
        </div>


        <div class="col-md-12 col-12">
            <div class="mb-5 py-5">
                <div class="cyber-card p-5 border-gradient-info text-center">
                    <h3 class="gradient-text mb-3">Help Me Shape the Future</h3>
                    <p class="text-secondary mx-auto mb-4" style="max-width: 600px;">
                        This platform is built for <span class="text-white">professionals like you</span>.
                        Have a feature idea or a template suggestion? I'm a solo developer listening to every word.
                    </p>

                    {{-- Modern Button Link --}}
                    <a href="{{ route('home') }}#contact"
                        class="text-decoration-none text-info">
                        <i class='bx bx-message-square-detail'></i> Share Your Feedback
                    </a>
                </div>
            </div>
        </div>


    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            const scrollContainer = document.getElementById("templateScroll");
            const btnLeft = document.getElementById("scrollLeft");
            const btnRight = document.getElementById("scrollRight");

            function updateButtons() {
                if (scrollContainer.scrollWidth > scrollContainer.clientWidth) {
                    btnRight.style.display = "block";
                } else {
                    btnLeft.style.display = "none";
                    btnRight.style.display = "none";
                }

                if (scrollContainer.scrollLeft > 0) {
                    btnLeft.style.display = "block";
                } else {
                    btnLeft.style.display = "none";
                }

                if (scrollContainer.scrollLeft + scrollContainer.clientWidth >= scrollContainer.scrollWidth - 5) {
                    btnRight.style.display = "none";
                }
            }

            btnRight.addEventListener("click", function() {
                scrollContainer.scrollBy({
                    left: 320,
                    behavior: "smooth"
                });
            });

            btnLeft.addEventListener("click", function() {
                scrollContainer.scrollBy({
                    left: -320,
                    behavior: "smooth"
                });
            });

            scrollContainer.addEventListener("scroll", updateButtons);

            updateButtons();
        });
    </script>
@endsection

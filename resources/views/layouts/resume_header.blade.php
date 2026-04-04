<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Full-Stack PHP/Laravel Developer')</title>
    <meta name="description" content="@yield('meta_description', 'Prabhat Yadav is a full-stack PHP & Laravel developer building secure backend systems, payment integrations, and scalable web applications.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Prabhat Yadav, PHP Developer, Laravel Developer, Full-Stack Developer, Backend Systems, Payment Integrations, Admin Dashboards, Scalable Web Applications')">
    <meta name="author" content="Prabhat Yadav">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', 'Mr Prabhat | Full-Stack Developer')">
    <meta property="og:description" content="@yield('meta_description', 'Building secure and scalable web applications.')">
    <meta property="og:image" content="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">

    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Fira+Code:wght@400;500&display=swap"
        rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <script>
        window.Laravel = {
            authCheckUrl: "{{ route('auth-check') }}",
            csrfToken: "{{ csrf_token() }}"
        };
    </script>
    @vite(['resources/css/style.css', 'resources/js/script.js', 'resources/css/builder.css'])

    <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>

<body>
    @php
        if (auth()->check()) {
            $user = auth()->user();
            $user->refresh();
        }
    @endphp

    <div class="neon-bg-wrapper">
        <div class="neon-blob blob-right"></div>
        <div class="neon-blob blob-left"></div>
    </div>
    @auth
        @if (!auth()->user()->hasVerifiedEmail())
            <div class="verification-banner">
                <div class="banner-content">
                    <span class="neon-icon">⚠</span>
                    <strong>SYSTEM_RESTRICTED:</strong> Your digital signature is pending.
                    <span class="desktop-text">Verify your email to unlock all AI Architect tools.</span>

                    <form method="POST" action="{{ route('verification.send') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="banner-btn">RESEND_LINK</button>
                    </form>
                </div>
            </div>
        @endif
    @endauth
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark ">
        <div class="container">

            <!-- Brand -->
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/icons/mrprabhat-logo.png') }}" width="40" alt="{{ config('app.name') }}"
                    class="navbar-logo-img me-2">

                <span class="navbar-logo-text fw-bold fs-3 text-white">
                    <span class="text-info">T</span>oolsby<span class="text-info">P</span>rabhat
                </span>
            </a>

            <!-- Toggle -->
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <i class="bx bx-menu-alt-right fs-2"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-4">
                    <!-- Common Links -->
                    <li class="nav-item d-lg-block d-none">
                        <a class="nav-link" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item d-lg-block d-none">
                        <a class="nav-link" href="{{ route('pricing') }}">Pricing</a>
                    </li>
                    <li class="nav-item d-lg-block d-none">
                        <a class="nav-link" href="{{ route('tools') }}">Tools</a>
                    </li>
                    @auth
                    @else
                        <li class="nav-item ms-lg-3 d-lg-block d-none">
                            <a href="{{ route('login') }}" class="btn btn-outline-info btn-neon-sm px-4 me-2">
                                Login
                            </a>

                            <a href="{{ route('signup') }}" class="btn bg-info btn-neon-sm px-4 text-dark fw-semibold">
                                Sign Up
                            </a>
                        </li>
                    @endauth

                    <!-- ========================= -->
                    <!-- DESKTOP USER DROPDOWN -->
                    <!-- ========================= -->
                    @auth
                        <li class="nav-item dropdown ms-lg-3 d-none d-lg-block">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <img src="{{ auth()->user()->avatar ?? asset('images/icons/user.png') }}" width="35"
                                    class="rounded-circle profile_display">
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end custom-dropdown shadow-lg">

                                <li class="px-3 py-2 text-italic">
                                    <span class="user_name">{{ $user->name }}</span> <br> {{ $user->email }}
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li class="px-3 py-2">
                                    <div class="d-flex gap-2">
                                        <div class="credit-box w-100 text-center">💎
                                            <span class="credits_count"> {{ $user->used_credits ?? 0 }}</span> /
                                            {{ $user->total_credits }}
                                        </div>
                                        <div class="credit-box w-100 text-center">📄 <span
                                                class="pdf_credit_used">{{ $user->pdf_exports_used ?? 0 }}</span> /
                                            <span class="pdf_total_count"> {{ $user->pdf_export_balance ?? 0 }}</span>
                                        </div>
                                    </div>
                                </li>

                                <li class="px-3">

                                    <a href="{{ route('pricing') }}" class="btn btn-sm btn-neon w-100 mt-3">
                                        Buy Credits
                                    </a>

                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <a class="dropdown-item" href="{{ route('profile') }}">
                                        <i class="bx bx-user me-2"></i> Profile
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('downloaded.resumes') }}">
                                        <i class="bx bx-download me-2"></i> Downloads
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#">
                                        <i class="bx bx-wallet-alt me-2"></i> Payments
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item logout-btn text-danger">
                                            <i class="bx bx-power-off me-2"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <div class="mobile-nav-link  d-lg-none">
                            <a class="nav-link px-0" href="{{ route('home') }}">
                                <i class="bx bx-user me-2"></i> Home
                            </a>
                            <a class="nav-link px-0 " href="{{ route('pricing') }}">
                                <i class="bx bx-user me-2"></i> Pricing
                            </a>
                            <a class="nav-link px-0 " href="{{ route('tools') }}">
                                <i class="bx bx-user me-2"></i> Tools
                            </a>
                            <li class="nav-item p-lg-0 ms-lg-3 d-flex gap-2">
                                <a href="{{ route('login') }}" class="btn btn-outline-info btn-neon-sm px-4">
                                    Login
                                </a>

                                <a href="{{ route('signup') }}"
                                    class="btn bg-info btn-neon-sm px-4 text-dark fw-semibold">
                                    Sign Up
                                </a>
                            </li>
                        </div>
                    @endauth
                    <!-- ========================= -->
                    <!-- MOBILE USER PANEL -->
                    <!-- ========================= -->
                    @auth
                        <li class="nav-item d-lg-none mt-4">
                            <div class="mobile-user-card p-3 rounded-4">
                                <div class="d-flex align-items-center mb-3">
                                    <img src="{{ auth()->user()->avatar ?? asset('images/icons/user.png') }}"
                                        width="40" class="rounded-circle me-2 profile_display">
                                    <span class="fw-semibold user_name">{{ $user->name }}</span>
                                </div>
                                <div class="d-flex gap-2 mb-3">
                                    <div class="credit-box w-100 text-center" id=""> 💎 <span
                                            class="credits_count">{{ $user->used_credits }}</span> /
                                        {{ $user->total_credits }}</div>
                                    <div class="credit-box w-100 text-center">📄 <span
                                            class="pdf_credit_used">{{ $user->pdf_exports_used }}</span> /
                                        <span class="pdf_total_count"> {{ $user->pdf_export_balance }}</span>
                                    </div>
                                </div>
                                <a href="{{ route('pricing') }}" class="btn btn-sm btn-neon w-100 my-3">
                                    Buy Credits
                                </a>
                                <a class="nav-link px-0" href="{{ route('home') }}">
                                    <i class="bx bx-home-alt me-2"></i> Home
                                </a>

                                <a class="nav-link px-0" href="{{ route('pricing') }}">
                                    <i class="bx bx-purchase-tag-alt me-2"></i> Pricing
                                </a>

                                <a class="nav-link px-0" href="{{ route('tools') }}">
                                    <i class="bx bx-layer me-2"></i> Tools
                                </a>
                                <a class="nav-link px-0" href="{{ route('downloaded.resumes') }}">
                                    <i class="bx bx-download me-2"></i> Downloads
                                </a>

                                <a class="nav-link px-0" href="{{ route('profile') }}">
                                    <i class="bx bx-user me-2"></i> Profile
                                </a>

                                <a class="nav-link px-0" href="#">
                                    <i class="bx bx-wallet-alt me-2"></i> Payments
                                </a>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="nav-link px-0 text-danger mt-2 border-0 bg-transparent w-100 text-start">
                                        <i class="bx bx-power-off me-2"></i> Logout
                                    </button>
                                </form>

                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>


    <section class="py-0">
        <div id="toast-container"></div>
        @yield('content')
    </section>


    {{-- <div class="modal fade" id="pricingModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content cyber-card p-4">
                <button type="button" class="btn-close-custom" data-bs-dismiss="modal">
                    <i class="bx bx-x"></i>
                </button>

                <div class="text-center mb-4">
                    <h3 class="gradient-text">Upgrade Your Power ⚡</h3>
                    <p class="text-secondary small">
                        Unlock more credits and export your resume like a pro.
                    </p>
                    <div class="d-flex justify-content-center mb-4">
                        <div class="country-toggle">
                            <button class="toggle-btn {{ !$isIndia ? 'active' : '' }}" data-country="global">
                                🇺🇸 Global
                            </button>
                            <button class="toggle-btn {{ $isIndia ? 'active' : '' }}" data-country="india">
                                🇮🇳 India
                            </button>
                        </div>
                    </div>
                </div>

                <div class="row g-4">
                    @php
                        // Helper to find plans safely
                        $starter = $dbPlans->where('plan_type', 'starter')->first();
                        $pdf = $dbPlans->where('plan_type', 'pdf_bundle')->first();
                        $pro = $dbPlans->where('plan_type', 'bundle_pro')->first();
                    @endphp

                    @if ($starter)
                        <div class="col-md-4">
                            <div class="pricing-box text-center p-4 h-100 d-flex flex-column">
                                <h5 class="gradient-text">{{ $starter->service }}</h5>
                                <h3 id="starter_price">
                                    {{ $isIndia ? '₹' . $starter->price_ind / 100 : '$' . number_format($starter->price_usd / 100, 2) }}
                                </h3>
                                <p class="small text-secondary">{{ $starter->ai_credits }} AI Usage Credits</p>

                                <ul class="small text-white list-unstyled flex-grow-1 mt-3">
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class='bx bxs-file-pdf text-info me-2'></i>
                                        <span><strong>{{ $starter->pdf_credits }}</strong> Premium PDF Export</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center text-info fw-bold">
                                        <i class='bx bxs-badge-check me-2'></i>
                                        <span>No Watermarks</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center opacity-50">
                                        <i class='bx bx-lock-alt me-2'></i>
                                        <span>AI Professional Summary Locked</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center opacity-50">
                                        <i class='bx bx-lock-alt me-2'></i>
                                        <span>AI ATS Score Checker Locked</span>
                                    </li>
                                </ul>

                                <button class="btn btn-neon w-100 buy-credits mt-3" data-plan="starter"
                                    data-type="starter"
                                    data-amount="{{ $isIndia ? $starter->price_ind : $starter->price_usd }}">
                                    Buy Now
                                </button>
                            </div>
                        </div>
                    @endif

                    @if ($pdf)
                        <div class="col-md-4">
                            <div
                                class="pricing-box text-center p-4 border border-warning position-relative h-100 d-flex flex-column">
                                <span class="badge bg-warning text-dark position-absolute top-0 end-0 m-3">Best
                                    Value</span>
                                <h5 class="gradient-text pt-3">{{ $pdf->service }}</h5>
                                <h3 id="pdf_price">
                                    {{ $isIndia ? '₹' . $pdf->price_ind / 100 : '$' . number_format($pdf->price_usd / 100, 2) }}
                                </h3>
                                <p class="small text-secondary">PDF Export + {{ $pdf->ai_credits }} Credits</p>

                                <ul class="small text-white list-unstyled flex-grow-1 mt-3">
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class='bx bxs-crown text-warning me-2'></i>
                                        <span><strong>{{ $pdf->pdf_credits }}</strong> High-Quality Exports</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class='bx bxs-magic-wand text-info me-2'></i>
                                        <span><strong>AI Professional Summary</strong></span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class='bx bx-radar text-info me-2'></i>
                                        <span><strong>AI ATS Score Checker</strong></span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class='bx bxs-zap text-info me-2'></i>
                                        <span>+{{ $pdf->ai_credits }} Bonus Credits</span>
                                    </li>
                                </ul>

                                <button type="button" class="btn btn-warning w-100 buy-credits mt-3"
                                    data-type="pdf_bundle" data-plan="pdf"
                                    data-amount="{{ $isIndia ? $pdf->price_ind : $pdf->price_usd }}">
                                    Get Bundle
                                </button>
                            </div>
                        </div>
                    @endif

                    @if ($pro)
                        <div class="col-md-4">
                            <div class="pricing-box text-center p-3 position-relative h-100 d-flex flex-column">
                                <span class="badge bg-info text-dark position-absolute top-0 end-0 m-3">Popular</span>
                                <h5 class="gradient-text pt-4">{{ $pro->service }}</h5>
                                <h3 id="pro_price">
                                    {{ $isIndia ? '₹' . $pro->price_ind / 100 : '$' . number_format($pro->price_usd / 100, 2) }}
                                </h3>
                                <p class="small text-secondary">{{ $pro->pdf_credits }} Exports +
                                    {{ $pro->ai_credits }} Credits</p>

                                <ul class="small text-white list-unstyled flex-grow-1 mt-3">
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class='bx bxs-crown text-warning me-2'></i>
                                        <span><strong>{{ $pro->pdf_credits }}</strong> PDF Downloads</span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class='bx bxs-magic-wand text-info me-2'></i>
                                        <span><strong>AI Professional Summary</strong></span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class='bx bx-radar text-info me-2'></i>
                                        <span><strong>AI ATS Score Checker</strong></span>
                                    </li>
                                    <li class="mb-2 d-flex align-items-center">
                                        <i class='bx bxs-bolt-circle text-info me-2'></i>
                                        <span>{{ $pro->ai_credits }} Usage Credits</span>
                                    </li>
                                </ul>

                                <button type="button" class="btn btn-neon w-100 buy-credits mt-3" data-plan="pro"
                                    data-type="bundle_pro"
                                    data-amount="{{ $isIndia ? $pro->price_ind : $pro->price_usd }}">
                                    Initialize Pro
                                </button>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div> --}}
    <div class="modal fade" id="successModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-success bg-dark shadow-lg featured-glow-success">
                <div class="modal-body text-center p-5 position-relative overflow-hidden">
                    <div class="position-absolute top-0 start-50 translate-middle"
                        style="width: 200px; height: 200px; background: radial-gradient(circle, rgba(25, 135, 84, 0.2) 0%, transparent 70%);">
                    </div>

                    <div class="mb-4">
                        <i class='bx bxs-check-shield text-success display-1 animate-bounce'></i>
                    </div>

                    <h3 class="text-white fw-bold mb-2">SYSTEM SYNCHRONIZED</h3>
                    <p class="text-secondary small tracking-widest mb-4">TRANSACTION VERIFIED | PROTOCOL COMPLETE</p>

                    <div class="p-3 rounded bg-success bg-opacity-10 border border-success border-opacity-25 mb-4">
                        <h6 class="text-success mb-2">Assets Deployed:</h6>
                        <div class="d-flex justify-content-around text-white">
                            <div>
                                <span class="d-block h4 mb-0" id="success_ai_credits">0</span>
                                <small class="text-secondary opacity-75">AI Credits</small>
                            </div>
                            <div class="border-start border-white border-opacity-10"></div>
                            <div>
                                <span class="d-block h4 mb-0" id="success_pdf_credits">0</span>
                                <small class="text-secondary opacity-75">PDF Exports</small>
                            </div>
                        </div>
                    </div>

                    <p class="text-secondary small mb-4">
                        Thank you for choosing <strong>{{ config('app.name') }}</strong>. Your professional profile has
                        been upgraded.
                    </p>

                    <div class="d-grid gap-2">
                        <a href="{{ route('tools.resume.builder') }}" class="btn btn-success py-2 fw-bold">
                            <i class='bx bx-rocket me-1'></i> Launch Builder
                        </a>
                        <button type="button" class="btn btn-link text-secondary text-decoration-none small"
                            data-bs-dismiss="modal">
                            Close Terminal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .featured-glow-success {
            box-shadow: 0 0 20px rgba(25, 135, 84, 0.3);
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        @keyframes bounce {

            0%,
            20%,
            50%,
            80%,
            100% {
                transform: translateY(0);
            }

            40% {
                transform: translateY(-10px);
            }

            60% {
                transform: translateY(-5px);
            }
        }
    </style>



    <!-- Main Content -->
    <footer class="mt-5 py-4 border-top border-dark">
        <div class="container text-center">
            <p class="text-secondary mb-2">
                &copy; {{ date('Y') }} — Built by
                <span class="text-white fw-bold">Prabhat Yadav</span>
            </p>
            <p class="small text-secondary">
                A solo-developer project dedicated to <span class="text-info">ATS Optimization</span>.
                Because your career deserves more than just a template.
            </p>
            {{-- <div class="social-links mt-3">
             <a href="#" class="text-info mx-2"><i class='bx bxl-linkedin'></i></a>
             <a href="#" class="text-info mx-2"><i class='bx bxl-github'></i></a>
        </div> --}}
        </div>
    </footer>
    @vite([
        'resources/js/payment.js',
         'resources/js/app.js',
        //  'resources/js/modules/ats-scanner.js',
        //  'resources/js/modules/expand-summary.js',
        //  'resources/js/modules/score-engine.js',
        //  'resources/js/modules/skill-engine.js',
        //  'resources/js/modules/ui-controller.js',
         ])

    @if ($errors->any())
 
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Check if showToast is defined (it should be in your app.js)
                if (typeof showToast === 'function') {
                    showToast('error', {!! json_encode($errors->first()) !!});
                } else {
                    console.error("Toast System Offline: showToast is not defined.");
                }
            });
        </script>
    @endif

    {{-- auth check required here --}}

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>

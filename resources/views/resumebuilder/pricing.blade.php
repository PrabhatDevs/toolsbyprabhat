@extends('layouts.resume_header')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <div
                class="d-inline-block px-3 py-1 mb-3 rounded-pill border border-info border-opacity-25 bg-info bg-opacity-10">
                <span class="text-info small fw-bold tracking-widest uppercase">
                    <i class='bx bxs-chip me-1'></i> SYSTEM TERMINAL: PRICING
                </span>
            </div>
            <h1 class="display-4 gradient-text fw-bold mb-3">Pay-As-You-Go</h1>
            <p class="text-secondary mx-auto" style="max-width: 600px;">
                No subscriptions. No monthly traps. Build your professional blueprint for the cost of a snack.
            </p>
        </div>

        <div class="row g-4 justify-content-center mb-5">

            @if ($starter)
                <div class="col-lg-4 col-md-6">
                    <div class="cyber-card h-100 p-4">
                        <div class="mb-4">
                            <h4 class="text-white">{{ $starter->service }}</h4>
                            <div class="d-flex align-items-baseline">
                                <span class="display-6 fw-bold text-white">
                                    {{ $isIndia ? '₹' . $starter->price_ind / 100 : '$' . number_format($starter->price_usd / 100, 2) }}
                                </span>
                                <span class="text-secondary ms-2 small">/ Credits</span>
                            </div>
                        </div>
                        <ul class="list-unstyled text-white mb-5">
                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bxs-crown text-warning me-2 fs-5'></i>
                                <span><strong>{{ $starter->pdf_credits }}</strong> High-Quality PDF Exports</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bxs-zap text-info me-2 fs-5'></i>
                                <span><strong>{{ $starter->ai_credits }}</strong> AI Usage Credits</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center text-info fw-bold">
                                <i class='bx bxs-badge-check me-2 fs-5'></i>
                                <span>No Watermarks</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center opacity-50">
                                <i class='bx bx-lock-alt me-2 fs-5'></i>
                                <span>AI Professional Summary Locked</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center opacity-50">
                                <i class='bx bx-lock-alt me-2 fs-5'></i>
                                <span>AI ATS Score Checker Locked</span>
                            </li>
                        </ul>
                        <div class="mt-auto">
                            <button class="btn btn-neon w-100 buy-credits mt-3" data-plan="starter" data-type="starter"
                                data-type="{{ $starter->id }}" data-email="{{ auth()->user()->email ?? '' }}"
                                data-name="{{ auth()->user()->name ?? '' }}"
                                data-url="{{ route('create.order') }}"
                                data-amount="{{ $isIndia ? $starter->price_ind : $starter->price_usd }}"
                                data-currency="{{ $isIndia ? 'INR' : 'USD' }}">
                                Buy {{ $starter->service }}
                            </button>
                        </div>
                    </div>
                </div>
            @endif
            @if ($pro)
                <div class="col-lg-4 col-md-6">
                    <div class="cyber-card h-100 p-4">
                        <div class="mb-4">
                            <h4 class="text-white">{{ $pro->service }}</h4>
                            <div class="d-flex align-items-baseline">
                                <span
                                    class="display-6 fw-bold text-white">{{ $isIndia ? '₹' . $pro->price_ind / 100 : '$' . number_format($pro->price_usd / 100, 2) }}</span>
                                <span class="text-secondary ms-2 small">/ Bundle</span>
                            </div>
                        </div>
                        <ul class="list-unstyled text-white mb-5">
                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bxs-crown text-warning me-2 fs-5'></i>
                                <span><strong>{{ $pro->pdf_credits }}</strong> High-Quality PDF Exports</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bxs-magic-wand text-info me-2 fs-5'></i>
                                <span><strong>AI Professional Summary</strong></span>
                            </li>

                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bx-radar text-info me-2 fs-5'></i>
                                <span><strong>AI ATS Score Checker</strong></span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bxs-bolt-circle text-info me-2 fs-5'></i>
                                <span><strong>{{ $pro->ai_credits }}</strong> AI Usage Credits</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center text-info fw-bold">
                                <i class='bx bxs-badge-check me-2 fs-5'></i>
                                <span>No Watermarks</span>
                            </li>
                        </ul>
                        <div class="mt-auto">

                            <button type="button" class="btn btn-neon w-100 buy-credits mt-3" data-plan="pro"
                                data-type="{{ $pro->id }}" data-email="{{ auth()->user()->email ?? '' }}"
                                data-name="{{ auth()->user()->name ?? '' }}" data-type="bundle_pro"
                                data-url="{{ route('create.order') }}"
                                data-amount="{{ $isIndia ? $pro->price_ind : $pro->price_usd }}"
                                data-currency="{{ $isIndia ? 'INR' : 'USD' }}">
                                Buy {{ $pro->service }}
                            </button>
                        </div>
                    </div>
                </div>
            @endif

            @if ($pdf)
                <div class="col-lg-4 col-md-6">
                    <div class="cyber-card h-100 p-4 featured-glow position-relative overflow-hidden">
                        <div class="popular-badge">MOST POPULAR</div>
                        <div class="mb-4">
                            <h4 class="text-info">{{ $pdf->service }}</h4>
                            <div class="d-flex align-items-baseline">
                                <span class="display-6 fw-bold text-white">
                                    {{ $isIndia ? '₹' . $pdf->price_ind / 100 : '$' . number_format($pdf->price_usd / 100, 2) }}
                                </span>
                                <span class="text-secondary ms-2 small">/ Export</span>
                            </div>
                        </div>
                        <ul class="list-unstyled text-white mb-5">
                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bxs-crown text-warning me-2 fs-5'></i>
                                <span><strong>{{ $pdf->pdf_credits }}</strong> High-Quality PDF Exports</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bxs-magic-wand text-info me-2 fs-5'></i>
                                <span><strong>AI Professional Summary</strong></span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bx-radar text-info me-2 fs-5'></i>
                                <span><strong>AI ATS Score Checker</strong></span>
                            </li>
                            <li class="mb-3 d-flex align-items-center">
                                <i class='bx bxs-zap text-info me-2 fs-5'></i>
                                <span><strong>{{ $pdf->ai_credits }}</strong> Bonus Credits</span>
                            </li>
                            <li class="mb-3 d-flex align-items-center text-info fw-bold">
                                <i class='bx bxs-shield-x me-2 fs-5'></i>
                                <span>No Watermarks</span>
                            </li>
                        </ul>
                        <div class="mt-auto">
                            <button type="button" class="btn btn-warning w-100 buy-credits mt-3" data-type="pdf_bundle"
                                data-plan="pdf" data-type="{{ $pdf->id }}"
                                data-email="{{ auth()->user()->email ?? '' }}"
                                data-name="{{ auth()->user()->name ?? '' }}"
                                data-url="{{ route('create.order') }}"
                                data-amount="{{ $isIndia ? $pdf->price_ind : $pdf->price_usd }}"
                                data-currency="{{ $isIndia ? 'INR' : 'USD' }}">
                                Buy {{ $pdf->service }}
                            </button>
                        </div>
                    </div>
                </div>
            @endif


        </div>

        <div class="row g-4 py-5 border-top border-white border-opacity-10 text-center">
            <div class="col-md-4">
                <i class='bx bx-shield-quarter text-info fs-1 mb-3'></i>
                <h5 class="text-white">Secure Gateway</h5>
                <p class="text-secondary small">Razorpay encrypted processing.</p>
            </div>
            <div class="col-md-4">
                <i class='bx bx-git-branch text-info fs-1 mb-3'></i>
                <h5 class="text-white">Persistent Data</h5>
                <p class="text-secondary small">Credits remain in your account forever.</p>
            </div>
            <div class="col-md-4">
                <div class="support-trigger" style="cursor: pointer;"
                    onclick="window.location.href='{{ route('home') . '#contact' }}'">
                    <i class='bx bx-message-square-dots text-info fs-1 mb-3 pulse-icon'></i>
                    <h5 class="text-white">Priority Relay</h5>
                    <p class="text-secondary small">Report bugs or contact support.</p>
                </div>
            </div>
        </div>
    </div>
@endsection

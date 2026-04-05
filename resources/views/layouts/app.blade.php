<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Tools by Prabhat | Full-Stack PHP/Laravel Developer')</title>
    <meta name="description" content="@yield('meta_description', 'Prabhat Yadav is a full-stack PHP & Laravel developer building secure backend systems, payment integrations, and scalable web applications.')">
    <meta name="keywords" content="@yield('meta_keywords', 'Prabhat Yadav, PHP Developer, Laravel Developer, Full-Stack Developer, Backend Systems, Payment Integrations, Admin Dashboards, Scalable Web Applications')">
    <meta name="author" content="Prabhat Yadav">

    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'Tools by Prabhat | Full-Stack Developer')">
    <meta property="og:description" content="@yield('meta_description', 'Building secure and scalable web applications.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Fira+Code:wght@400;500&display=swap"
        rel="stylesheet">

    <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    @vite(['resources/css/layout-app.css', 'resources/js/app.js', 'resources/css/style.css'])
</head>

<body>

    <div class="architect-bg-base">
        <div class="architect-bg-pattern"></div>
        <div class="architect-bg-vignette"></div>
        <div class="architect-purple-accent-line"></div>
    </div>

    <div class="neon-bg-wrapper">
        <div class="neon-blob blob-right"></div>
        <div class="neon-blob blob-left"></div>
    </div>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/icons/mrprabhat-logo.png') }}" width="40" alt="Tools by Prabhat"
                    class="navbar-logo-img me-2">

                <span class="navbar-logo-text fw-bold fs-3 text-white">
                    <span class="text-info">T</span>oolsby<span class="text-info">P</span>rabhat
                </span>
            </a>

            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center gap-2 gap-lg-4">
                    <li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Stack</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Work</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">Blogs</a></li>
                    <li class="nav-item"><a href="{{ route('tools') }}" class="nav-link">Tools</a></li>

                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-neon w-100" href="{{ route('download_resume') }}">⬇ Download Resume</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <section class="py-5" style="">

        @yield('content')
    </section>


    <!-- Main Content -->
    <footer class="py-2 border-top border-secondary bg-black">
        <div class="container text-center">
            <div class="mb-1">
                <ul class="list-inline mb-0 text-secondary small opacity-75">
                    <li class="list-inline-item px-2">
                        <a href="{{ route('terms') }}" class="text-decoration-none text-secondary hover-neon">Terms of
                            Service</a>
                    </li>
                    <li class="list-inline-item px-2">
                        <a href="{{ route('privacy') }}" class="text-decoration-none text-secondary hover-neon">Privacy
                            Policy</a>
                    </li>
                    <li class="list-inline-item px-2">
                        <a href="{{ route('refund') }}" class="text-decoration-none text-secondary hover-neon">Refund
                            Policy</a>
                    </li>
                </ul>
            </div>

            <div class="text-secondary small opacity-50">
                <p class="mb-0 text-secondary small">
                    ©
                    <span class="me-1">
                      2026
                    </span>
                    Toolsbyprabhat. Developed with
                    <span style="color: var(--neon-blue);">❤️</span>
                </p>
            </div>
        </div>

        <style>
            .hover-neon:hover {
                color: var(--neon-blue) !important;
                text-shadow: 0 0 8px var(--neon-blue);
                transition: 0.3s;
            }

            .list-inline-item:not(:last-child) {
                border-right: 1px solid rgba(255, 255, 255, 0.1);
            }
        </style>
    </footer>


    <script src="{{ asset('js/script.js') }}"></script>


    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Wait 100ms to ensure script.js (and showToast) is ready

                if (typeof showToast === 'function') {
                    // Pull only the first error string, ignore the rest
                    const firstError = {!! json_encode($errors->first()) !!};
                    showToast("error", firstError);
                }

            });
        </script>
    @endif

    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>
</body>

</html>

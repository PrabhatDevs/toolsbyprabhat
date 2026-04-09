<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $appname }} | Full-Stack PHP/Laravel Developer</title>
    <meta name="description"
        content="Prabhat Yadav is a full-stack PHP & Laravel developer building secure backend systems, payment integrations, admin dashboards, and scalable web applications.">
    <meta name="keywords"
        content="Prabhat Yadav, PHP Developer, Laravel Developer, Full-Stack Developer, Backend Systems, Payment Integrations, Admin Dashboards, Scalable Web Applications, Secure Authentication, Web Development, freelance developer, php freelancer, laravel freelancer, web developer for hire, 
    backend developer, startup developer, web application developer, api developer, payment gateway integration, secure web development">
    <meta name="author" content="Prabhat Yadav">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Fira+Code:wght@400;500&display=swap"
        rel="stylesheet">
    <!-- Chart.js -->
     <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script
  src="https://challenges.cloudflare.com/turnstile/v0/api.js"
  async
  defer
></script>
    <style>
        :root {
            --bg-dark: #030712;
            --neon-blue: #00f2fe;
            --neon-purple: #7000ff;
            --cyber-cyan: #00f5ff;
            --glass-bg: rgba(255, 255, 255, 0.03);
            --glass-border: rgba(255, 255, 255, 0.1);
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-dark);
            color: #e2e8f0;
            overflow-x: hidden;
            scroll-behavior: smooth;
        }

        .code-font {
            font-family: 'Fira Code', monospace;
        }

        /* Neon Background Blobs */
        /* .neon-blob {
            position: absolute;
            width: 400px;
            height: 400px;
            background: linear-gradient(135deg, var(--neon-blue), var(--neon-purple));
            filter: blur(120px);
            opacity: 0.15;
            z-index: -1;
            border-radius: 50%;
            overflow: hidden;
        } */
        .neon-blob {
            position: absolute;
            width: 400px;
            height: 400px;
            right: -5%;
        }

        .neon-bg-wrapper {
            position: fixed;
            inset: 0;
            overflow: hidden;
            pointer-events: none;
            z-index: -1;
        }

        .neon-blob {
            position: absolute;
            width: 400px;
            height: 400px;
            filter: blur(120px);
            opacity: 0.15;
            border-radius: 50%;
        }

        .blob-right {
            top: 10%;
            right: -50px;
            background: linear-gradient(135deg, var(--neon-blue), var(--neon-purple));
        }

        .blob-left {
            bottom: 10%;
            left: -150px;
            background: var(--neon-purple);
        }


        /* Typography */
        .gradient-text {
            background: linear-gradient(45deg, var(--neon-blue), #4facfe, var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        /* Navbar - Glassmorphism */
        .navbar {
            background: rgba(3, 7, 18, 0.8) !important;
            backdrop-filter: blur(15px);
            border-bottom: 1px solid var(--glass-border);
            transition: all 0.4s ease;
        }

        .cyber-card {
            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            transition: all 0.3s ease;
        }

        .cyber-card:hover {
            border-color: var(--neon-blue);
            box-shadow: 0 0 20px rgba(0, 242, 254, 0.2);
            transform: translateY(-3px);
        }

        /* --- Updated Dropdown & Input Styling --- */
        .cyber-input {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            color: white !important;
            padding: 12px 16px;
            border-radius: 12px;
            transition: all 0.3s;
        }

        /* Fix for Bootstrap Select Arrow in Dark Mode */
        /* .form-select.cyber-input {
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%2300f2fe' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e") !important;
            background-position: right 0.75rem center !important;
            background-size: 16px 12px !important;
        } */

        /* Forcing Option backgrounds to be dark */
        .cyber-input option {
            background-color: #030712 !important;
            color: white !important;
        }

        .cyber-input:focus {
            background-color: rgba(255, 255, 255, 0.1) !important;
            border-color: var(--neon-blue) !important;
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.4) !important;
            color: white !important;
            outline: none;
        }





        /* Neon Border Button */
        .btn-neon {
            background: transparent;
            border: 1px solid var(--neon-blue);
            color: var(--neon-blue);
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 0 10px rgba(0, 242, 254, 0.1);
        }

        .btn-neon:hover {
            background: var(--neon-blue);
            color: var(--bg-dark);
            box-shadow: 0 0 25px rgba(0, 242, 254, 0.5);
        }

        /* Hero Styling */
        .hero-section {
            padding: 180px 0 100px;
            position: relative;
        }

        .hero-title {
            font-size: calc(2.5rem + 3vw);
            line-height: 1;
            margin-bottom: 1.5rem;
        }

        /* Mock Terminal - Cyber Look */
        .cyber-terminal {
            background: #0a0a0f;
            border: 1px solid var(--neon-purple);
            border-radius: 15px;
            padding: 25px;
            box-shadow: 0 0 30px rgba(112, 0, 255, 0.15);
        }

        /* Chart */
        .chart-wrapper {
            position: relative;
            height: 300px;
            width: 100%;
        }

        /* Skill Item */
        .skill-node {
            background: rgba(255, 255, 255, 0.02);
            border-left: 3px solid var(--neon-blue);
            padding: 15px;
            border-radius: 0 10px 10px 0;
            transition: all 0.2s;
        }

        .skill-node:hover {
            background: rgba(0, 242, 254, 0.05);
            border-left-color: var(--neon-cyan);
            padding-left: 20px;
        }

        /* Project Row */
        .project-glow-row {
            background: linear-gradient(90deg, rgba(255, 255, 255, 0.02) 0%, rgba(255, 255, 255, 0) 100%);
            border: 1px solid var(--glass-border);
            border-radius: 20px;
            padding: 40px;
            margin-bottom: 2rem;
            transition: border-color 0.3s;
        }

        .project-glow-row:hover {
            border-color: var(--neon-purple);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: var(--bg-dark);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--neon-purple);
            border-radius: 10px;
        }


        /* --- Pulse Animation for Freelance Badge --- */
        .pulse-dot {
            width: 8px;
            height: 8px;
            background-color: var(--neon-blue);
            border-radius: 50%;
            display: inline-block;
            box-shadow: 0 0 10px var(--neon-blue);
            animation: cyber-pulse 2s infinite ease-in-out;
        }

        @keyframes cyber-pulse {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
                box-shadow: 0 0 10px var(--neon-blue);
            }

            50% {
                opacity: 0.4;
                transform: scale(1.3);
                box-shadow: 0 0 20px var(--neon-blue);
            }
        }
    </style>
    <style>
        .status-badge {
            padding: 5px 12px;
            font-size: 0.65rem;
            border-radius: 50px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .status-dev {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
            border: 1px solid #ffc107;
        }

        .status-live {
            background: rgba(0, 242, 254, 0.1);
            color: var(--neon-blue);
            border: 1px solid var(--neon-blue);
            box-shadow: 0 0 10px rgba(0, 242, 254, 0.4);
        }

        .tech-pill {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--glass-border);
            padding: 4px 10px;
            font-size: 0.65rem;
            border-radius: 20px;
            color: #cbd5e1;
        }

        .progress-neon {
            background: var(--neon-blue);
            box-shadow: 0 0 12px var(--neon-blue);
        }

        .green-blink {
            width: 10px;
            height: 10px;
            background-color: #00ff6a;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
            box-shadow: 0 0 8px #00ff6a;
            animation: greenPulse 1.5s infinite ease-in-out;
        }
.yellow-blink {
            width: 10px;
            height: 10px;
            background-color: #ffeb3b;
            border-radius: 50%;
            display: inline-block;
            margin-right: 6px;
            box-shadow: 0 0 8px #ffeb3b;
            animation: yellowPulse 1.5s infinite ease-in-out;
        }

@keyframes yellowPulse {
            0% {
                opacity: 1;
                transform: scale(1);
                box-shadow: 0 0 8px #ffeb3b;
            }

            50% {
                opacity: 0.3;
                transform: scale(1.4);
                box-shadow: 0 0 18px #ffeb3b;
            }

            100% {
                opacity: 1;
                transform: scale(1);
                box-shadow: 0 0 8px #ffeb3b;
            }
        }


        @keyframes greenPulse {
            0% {
                opacity: 1;
                transform: scale(1);
                box-shadow: 0 0 8px #00ff6a;
            }

            50% {
                opacity: 0.3;
                transform: scale(1.4);
                box-shadow: 0 0 18px #00ff6a;
            }

            100% {
                opacity: 1;
                transform: scale(1);
                box-shadow: 0 0 8px #00ff6a;
            }
        }
    </style>
</head>

<body>

    

    <div class="neon-bg-wrapper">
        <div class="neon-blob blob-right"></div>
        <div class="neon-blob blob-left"></div>
    </div>


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="#">
                <img src="{{ asset('images/icons/mrprabhat-logo.png') }}" width="40" alt="Mr Prabhat"
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
                    <li class="nav-item"><a class="nav-link" href="{{ route('viewResume') }}">Identity</a></li>
                    <li class="nav-item"><a class="nav-link" href="#skills">Stack</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#projects">Work</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('blogs') }}">Blogs</a></li>
 <li class="nav-item"><a href="{{ route('tools') }}" class="nav-link">Tools</a></li>
                    <li class="nav-item ms-lg-2">
                        <a class="btn btn-neon w-100" href="#contact">Initialize Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero" class="hero-section">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-7 col-12">
                    <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill mb-4"
                        style="background: rgba(0, 242, 254, 0.1); border: 1px solid var(--neon-blue); color: var(--neon-blue); font-size: 0.8rem; font-weight: 600; text-transform: uppercase; letter-spacing: 0.5px;">
                        <span class="pulse-dot"></span>
                        Open for Freelance Projects
                    </div>
                    <h1 class="hero-title fw-extrabold">
                        I build <span class="gradient-text">backend systems</span>, not just websites.
                    </h1>

                    <p class="lead text-secondary mb-3 opacity-75">
                        Prabhat Here — 2+ years Full-Stack PHP & Laravel Developer specializing in secure
                        authentication,
                        payment integrations, admin dashboards, and scalable web architectures.
                    </p>
                    <p class="small text-secondary mb-5 opacity-75">
                        "Best suited for startups, founders, and businesses needing secure backend systems,
                        payment integrations, and long-term PHP/Laravel support."
                    </p>
                    <div class="d-flex flex-wrap gap-3">
                        <a href="#projects" class="btn btn-primary btn-lg rounded-pill px-5 shadow-lg"
                            style="background: var(--neon-blue); border: none; color: var(--bg-dark); font-weight: 700;">Explore
                            Works</a>
                        <a href="#contact" class="btn btn-outline-light btn-lg rounded-pill px-5">Get in Touch</a>
                    </div>

                </div>

                <div class="col-lg-5 d-none d-lg-block">
                    <div class="cyber-terminal">
                        <div class="d-flex gap-2 mb-4">
                            <div class="rounded-circle" style="width: 10px; height: 10px; background: #ff5f56;"></div>
                            <div class="rounded-circle" style="width: 10px; height: 10px; background: #ffbd2e;"></div>
                            <div class="rounded-circle" style="width: 10px; height: 10px; background: #27c93f;"></div>
                        </div>
                        <div class="code-font small">
                            <p class="mb-1 text-info">// Application Core</p>

                            <p class="mb-1 text-light">
                                <span class="text-purple-400">namespace</span> App\Core;
                            </p>

                            <p class="mb-1 mt-3">
                                <span class="text-primary">class</span>
                                <span class="text-warning">LaravelEngine</span> {
                            </p>

                            <p class="mb-1 ps-3">
                                <span class="text-primary">public function</span>
                                <span class="text-warning">boot</span>() {
                            </p>

                            <p class="mb-1 ps-5">
                                <span class="text-danger">return</span> [
                            </p>

                            <p class="mb-1 ps-5 ms-3" style="color: var(--neon-blue);">
                                'backend' => 'php_laravel',
                            </p>

                            <p class="mb-1 ps-5 ms-3" style="color: var(--neon-blue);">
                                'database' => 'mysql',
                            </p>

                            <p class="mb-1 ps-5 ms-3" style="color: var(--neon-blue);">
                                'auth' => 'role_based_secure',
                            </p>

                            <p class="mb-1 ps-5 ms-3" style="color: var(--neon-blue);">
                                'payments' => ['razorpay', 'stripe', 'paypal'],
                            </p>

                            <p class="mb-1 ps-5 ms-3" style="color: var(--neon-blue);">
                                'api' => 'rest_token_based',
                            </p>

                            <p class="mb-1 ps-5 ms-3" style="color: var(--neon-blue);">
                                'deployment' => 'ftp_filezilla'
                            </p>

                            <p class="mb-1 ps-5">];</p>
                            <p class="mb-1 ps-3">}</p>
                            <p class="mb-0">}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Identity & Analytics -->
    <section id="about" class="py-5 bg-dark border-top border-secondary">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-6">
                    <h2 class="fw-bold mb-4">Core Identity</h2>
                    <div class="cyber-card p-4 mb-4">
                        <h4 class="text-info fw-bold mb-3">🚀 The Mission</h4>
                        <p class="text-secondary mb-0">I don’t just “make websites” — I build systems: authentication
                            flows, admin dashboards, APIs, payment integrations, and performance-focused applications
                            designed to grow.</p>
                    </div>
                    <div class="cyber-card p-4">
                        <h4 class="text-purple-400 fw-bold mb-3">🛠️ Methodology</h4>
                        <ul class="list-unstyled text-secondary mb-0">
                            <li class="mb-2">● Deep requirement analysis before a single line of code.</li>
                            <li class="mb-2">● Custom MVC architectures for ultra-fast performance.</li>
                            <li>● Security-first approach (CSRF, Middleware, Sanitization).</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="cyber-card p-5">
                        <h5 class="text-center fw-bold mb-4">System Proficiency</h5>
                        <div class="chart-wrapper">
                            <canvas id="skillsChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- New Full Management Section -->
    <section id="full-management" class="py-5 bg-dark">
        <div class="container py-5">
            <!-- Section Title -->
            <div class="mb-5 text-center text-lg-start">
                <h2 class="fw-bold text-white mb-2">Full Website Management & Development</h2>
                <p class="text-secondary mb-0">
                    I work as a long-term technical partner — understanding your business first,
                    then building, deploying, and maintaining secure backend systems that grow with your product.
                </p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">🛠️</div>
                        <h5 class="fw-bold text-info mb-2">Complete Development</h5>
                        <p class="text-secondary small mb-0">
                            Full-stack website development using PHP and Laravel, including frontend integration,
                            backend logic, database design, and authentication systems.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">🚀</div>
                        <h5 class="fw-bold text-info mb-2">Deployment & Hosting</h5>
                        <p class="text-secondary small mb-0">
                            Server setup, project deployment, environment configuration, and production optimization
                            using FTP, hosting panels, and server tools.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">🔄</div>
                        <h5 class="fw-bold text-info mb-2">Ongoing Maintenance</h5>
                        <p class="text-secondary small mb-0">
                            Regular updates, bug fixes, feature enhancements, database maintenance,
                            and performance monitoring for live websites.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">🔐</div>
                        <h5 class="fw-bold text-info mb-2">Security & Stability</h5>
                        <p class="text-secondary small mb-0">
                            Secure authentication, data protection, CSRF prevention, access control,
                            and safe handling of user data and payments.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">📊</div>
                        <h5 class="fw-bold text-info mb-2">Admin & Content Management</h5>
                        <p class="text-secondary small mb-0">
                            Custom admin dashboards to manage users, content, orders, payments,
                            and system configurations without technical hassle.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">🤝</div>
                        <h5 class="fw-bold text-info mb-2">Long-Term Support</h5>
                        <p class="text-secondary small mb-0">
                            Reliable long-term support for startups, businesses, and platforms
                            needing consistent backend management and development.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Stack Selection -->
    <section id="skills" class="py-5 border-top border-bottom border-secondary" style="background: #050a15;">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold">The Tech Arsenal</h2>
                <p class="text-secondary">High-performance tools for modern development.</p>
            </div>

            <div class="d-flex flex-wrap justify-content-center gap-2 mb-5">
                <button class="btn btn-outline-info rounded-pill px-4 filter-btn" data-filter="all">All
                    Modules</button>
                <button class="btn btn-outline-secondary rounded-pill px-4 filter-btn"
                    data-filter="backend">Backend</button>
                <button class="btn btn-outline-secondary rounded-pill px-4 filter-btn"
                    data-filter="frontend">Frontend</button>
                <button class="btn btn-outline-secondary rounded-pill px-4 filter-btn" data-filter="database">Data &
                    Tools</button>
            </div>

            <div class="row g-3" id="skills-grid">
                <!-- Javascript populates -->
            </div>
        </div>
    </section>

    <!-- Services -->
    <section id="services" class="py-5">
        <div class="container py-5">
            <div class="row g-3">

                <div class="mb-5 pt-5 text-center text-lg-center">
                    <h2 class="fw-bold text-white mb-1">Services</h2>
                    <p class="text-secondary">
                        Backend systems • Payments • APIs • Security
                    </p>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">⚙️</div>
                        <h5 class="fw-bold text-info mb-2">Backend Logic</h5>
                        <p class="text-secondary small mb-0">
                            Custom PHP/Laravel systems, admin panels, and role-based architectures built for
                            high-traffic
                            applications.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">💳</div>
                        <h5 class="fw-bold text-info mb-2">Payment Systems</h5>
                        <p class="text-secondary small mb-0">
                            Secure Razorpay, Stripe, and PayPal integrations with webhook handling, refunds, and
                            transaction
                            logs.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">📡</div>
                        <h5 class="fw-bold text-info mb-2">API Ecosystems</h5>
                        <p class="text-secondary small mb-0">
                            RESTful APIs for mobile apps and third-party services with token-based authentication and
                            access
                            control.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">🔐</div>
                        <h5 class="fw-bold text-info mb-2">Authentication & Security</h5>
                        <p class="text-secondary small mb-0">
                            Secure login systems, role-based permissions, CSRF protection, session handling, and API
                            authentication.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">🗂️</div>
                        <h5 class="fw-bold text-info mb-2">Admin Dashboards</h5>
                        <p class="text-secondary small mb-0">
                            Scalable admin panels for managing users, content, orders, partners, and system
                            configurations.
                        </p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4">
                    <div class="cyber-card h-100 p-4 text-center">
                        <div class="icon-box mb-4">📁</div>
                        <h5 class="fw-bold text-info mb-2">FileZilla / FTP Management</h5>
                        <p class="text-secondary small mb-0">
                            Server file management using FileZilla and FTP for deployments, updates, backups, and secure
                            transfers.
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <!-- Work Showcase -->
    <section id="projects" class="py-5 border-top border-secondary">
        <div class="container py-5">
            <h2 class="fw-bold mb-5">Successful Developments</h2>
            <div class="row g-0" id="projects-list">
                <!-- Javascript populates -->
            </div>
        </div>
    </section>

<section id="tools-terminal" class="py-5 border-top border-secondary" style="background:#050a15;">
    <div class="container py-5">

        <div class="text-center mb-5">
            <h2 class="fw-bold text-white mb-2 d-flex align-items-center justify-content-center gap-2">
                <span class="blue-blink"></span> My Digital Tools
            </h2>
            <p class="text-secondary mx-auto" style="max-width: 600px;">
                A collection of AI-powered utilities and helper tools I've built to make daily tasks easier, faster, and more secure.
            </p>
        </div>

        <div class="row g-4 mb-5">

            <div class="col-md-6 col-lg-4">
                <div class="cyber-card h-100 p-4 border-info">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge rounded-pill bg-success-subtle text-success small px-2 py-1 border border-success">LIVE</span>
                        <i class="bi bi-file-earmark-person text-info fs-4"></i>
                    </div>
                    <h5 class="text-white fw-bold">AI Resume Builder</h5>
                    <p class="text-secondary small">Type your details and get a professional resume in seconds. No data is stored, keeping your history private.</p>
                    <div class="mt-3">
                        <span class="tech-pill">ChatGPT API</span>
                        <span class="tech-pill">PDF Gen</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="cyber-card h-100 p-4 opacity-75" style="border-style: dashed;">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <span class="badge rounded-pill bg-warning-subtle text-warning small px-2 py-1 border border-warning">IN PROGRESS</span>
                        <i class="bi bi-image text-secondary fs-4"></i>
                    </div>
                    <h5 class="text-white fw-bold">AI BG-Remover</h5>
                    <p class="text-secondary small">Automatically remove backgrounds from images with one click. Currently tuning the AI for better edges.</p>
                    <div class="mt-3">
                        <span class="tech-pill">Python</span>
                        <span class="tech-pill">CV</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4">
                <div class="cyber-card h-100 p-4 d-flex flex-column justify-content-center align-items-center text-center border-secondary opacity-50">
                    <div class="mb-3">
                        <i class="bi bi-plus-circle text-secondary fs-1"></i>
                    </div>
                    <h6 class="text-secondary fw-bold">More Tools Coming...</h6>
                    <p class="text-secondary smallest">I'm always building new helpers.</p>
                </div>
            </div>

        </div>

        <div class="text-center">
            <a href="/tools" class="btn btn-outline-info px-5 py-3 fw-bold btn-neon">
                EXPLORE ALL TOOLS <i class="bi bi-chevron-right ms-2"></i>
            </a>
            <p class="mt-3 small text-secondary">Check out the full list of available and upcoming projects.</p>
        </div>

    </div>
</section>

<style>
    .blue-blink {
        width: 10px; height: 10px;
        background-color: #00d4ff;
        border-radius: 50%;
        animation: blink-blue 1.5s infinite;
        box-shadow: 0 0 10px #00d4ff;
    }

    @keyframes blink-blue {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.2; }
    }

   
</style>


    

    <!-- Active Builds Section -->
    <section id="active-builds" class="py-5 border-top border-secondary" style="background:#050a15;">
        <div class="container py-5">

            <!-- Section Title -->
            <div class="text-center mb-5">
                <h2 class="fw-bold text-white mb-2 align-items-center d-flex justify-content-center gap-2">
                    <span class="green-blink"></span> Active Builds
                </h2>
                <p class="text-secondary mb-0">
                    Ongoing web projects designed to solve real business problems through secure development, scalable
                    structure, and efficient backend management.
                </p>
            </div>

            <div class="row g-4">

                <!-- Project 1 -->
                <div class="col-lg-6">
                    <div class="cyber-card h-100 p-4">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-info mb-0">
                                Home Edits E-Commerce Platform
                            </h5>
                            <span class="status-badge status-dev align-items-center d-flex">
                                <span class="yellow-blink"></span> In Development
                            </span>
                        </div>

                        <p class="text-secondary small mb-3">
                            A full-featured home interior and service-based e-commerce platform,
                            inspired by modern brands like Urban Company — integrating product listings,
                            service bookings, cart management, and secure order processing.
                        </p>

                        <div class="mb-3">
                            <small class="text-secondary d-block mb-1">Core Stack</small>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="tech-pill">Laravel</span>
                                <span class="tech-pill">MySQL</span>
                                <span class="tech-pill">Bootstrap</span>
                                <span class="tech-pill">JavaScript</span>
                                <span class="tech-pill">Payment Integration</span>
                            </div>
                        </div>

                        <div>
                            <small class="text-secondary d-block mb-2">Key Modules</small>
                            <ul class="text-secondary small mb-0 ps-3">
                                <li>Product & service catalog system</li>
                                <li>Cart & checkout workflow</li>
                                <li>User authentication & order tracking</li>
                                <li>Admin dashboard for content & order management</li>
                                <li>Secure payment processing integration</li>
                            </ul>
                        </div>

                    </div>
                </div>

                <!-- Project 2 -->
                <div class="col-lg-6">
                    <div class="cyber-card h-100 p-4">

                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="fw-bold text-info mb-0">
                                US Live Stock Market Platform
                            </h5>
                            <span class="status-badge status-live align-items-center d-flex">
                                <span class="green-blink"></span> Live
                            </span>
                        </div>

                        <p class="text-secondary small mb-3">
                            A fully functional stock tracking platform powered by real-time US market APIs.
                            Built with secure authentication, personalized watchlists, dynamic data rendering,
                            and a custom-designed responsive UI from scratch.
                        </p>

                        <div class="mb-3">
                            <small class="text-secondary d-block mb-1">Core Stack</small>
                            <div class="d-flex flex-wrap gap-2">
                                <span class="tech-pill">Core PHP</span>
                                <span class="tech-pill">REST APIs</span>
                                <span class="tech-pill">JavaScript</span>
                                <span class="tech-pill">MySQL</span>
                                <span class="tech-pill">Bootstrap</span>
                            </div>
                        </div>

                        <div>
                            <small class="text-secondary d-block mb-2">Key Features</small>
                            <ul class="text-secondary small mb-0 ps-3">
                                <li>Live US stock price updates</li>
                                <li>Secure login & authentication system</li>
                                <li>Bookmark / Watchlist functionality</li>
                                <li>Dynamic API-driven data rendering</li>
                                <li>Fully custom UI & responsive design</li>
                            </ul>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


    <!-- Final CTA -->
    <section id="contact" class="py-5 bg-black border-top border-secondary position-relative">
        <div class="container py-5">
            <div class="row g-4 align-items-center">
                <div class="col-lg-5">
                    <h2 class="display-5 fw-bold mb-4">Initialize <span class="text-info">Project</span>?</h2>
                    <p class="text-secondary mb-5">I work with freelance and long-term clients, providing clean
                        documentation,
                        post-launch support, and transparent communication throughout the project.
                    </p>
                    <p class="small text-secondary mt-3 opacity-75">
                        Ideal for startups, founders, and businesses needing backend-heavy systems,
                        payment integrations, or long-term PHP/Laravel development.
                    </p>

                    <div class="d-flex flex-column gap-3">
                        <a href="mailto:info@toolsbyprabhat.com"
                            class="cyber-card p-3 d-flex align-items-center gap-3 text-decoration-none text-white w-100">
                            <span class="fs-4">📧</span>
                            <div>
                                <small class="text-secondary d-block">Protocol: Email</small>
                                <span class="fw-bold">info@toolsbyprabhat.com</span>
                            </div>
                        </a>
                        <div class="cyber-card p-3 d-flex align-items-center gap-3"><span>📍</span><span
                                class="fw-bold">India</span></div>
                        <a href="https://t.me/MrPrabhatYadav?text=Hi%20I%20want%20to%20discuss%20a%20project"
                            target="_blank"
                            class="cyber-card p-3 d-flex align-items-center gap-3 text-decoration-none">
                            <span>💬</span>
                            <span class="fw-bold">Talk on Telegram</span>
                        </a>

                    </div>
                </div>

                <div class="col-lg-7">
                    <div class="cyber-card p-4 p-md-5">
                        <h4 class="fw-bold mb-4 text-white">Transmission Query</h4>
                        <form id="queryForm" action="{{ route('submitQuery') }}" method="post">
                            @csrf
                            <div class="cf-turnstile" data-sitekey="{{config('services.turnstile.site_key')}}"></div>
                            <input type="text" name="website" style="display:none">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="small text-secondary mb-1">Full Name</label>
                                    <input type="text" name="name" class="form-control cyber-input"
                                        placeholder="User Identifier" required>
                                </div>

                                <div class="col-md-6">
                                    <label class="small text-secondary mb-1">Email Protocol</label>
                                    <input type="email" name="email" class="form-control cyber-input"
                                        placeholder="user@domain.com" required>
                                </div>
                                <div class="col-12">
                                    <label class="small text-secondary mb-1">Subject</label>
                                    <select class="form-select cyber-input" name="subject" required>
                                        <option value="" disabled selected>Select Inquiry Type</option>
                                        <option value="Freelance Request">Freelance Request</option>
                                        <option value="Long-term Collaboration">Long-term Collaboration</option>
                                        <option value="System Improvement">System Improvement</option>
                                        <option value="General Query">General Query</option>
                                        <option value="A Feature/Suggestions">A Feature/Suggestions</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label class="small text-secondary mb-1">Estimated Project Budget</label>
                                    <select class="form-select cyber-input" name="budget" required>
                                        <option value="" disabled selected>Select budget range</option>
                                        <option value="Casual Query">Just a Casual Query</option>
                                        <option value="Below $300 / ₹25k">Below $300 / ₹25k</option>
                                        <option value="$300 – $800 / ₹25k – ₹70k">$300 – $800 / ₹25k – ₹70k</option>
                                        <option value="$800+ / ₹70k+">$800+ / ₹70k+</option>
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="small text-secondary mb-1">Requirements</label>
                                    <textarea class="form-control cyber-input" name="requirements" rows="6"
                                        placeholder="Briefly describe your idea:
• What do you want to build?
• Who will use it?
• Any reference website?
• Timeline (if any)">
</textarea>


                                </div>
                                <div class="col-12 mt-4">
                                    <button type="submit" id="submitBtn" class="btn btn-neon w-100">Initialize
                                        Transmission</button>

                                </div>
                                <p class="small text-secondary text-center mt-3 opacity-75">
                                    I’ll review your requirements and reply with next steps.
                                </p>

                                <div id="formStatus" class="col-12 mt-3 text-center small" style="display: none;">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="py-4 border-top border-secondary bg-black">
        <div class="container text-center text-secondary small opacity-50">
            <p class="mb-0">©
                <script>
                    document.write(new Date().getFullYear())
                </script> Prabhat Yadav. Developed with
                <span style="color: var(--neon-blue);">❤️</span>
            </p>
        </div>
    </footer>

    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 9999">
        <div id="resultToast" class="toast align-items-center text-white border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body" id="toastMessage"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto"
                    data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // System Data
        const modules = [{
                name: "PHP (OOP/MVC)",
                cat: "backend",
                level: 95
            },
            {
                name: "Laravel Framework",
                cat: "backend",
                level: 92
            },
            {
                name: "Admin Dashboards",
                cat: "backend",
                level: 88
            },
            {
                name: "MySQL Design",
                cat: "database",
                level: 88
            },
            {
                name: "Database Optimization",
                cat: "database",
                level: 85
            },
            {
                name: "Query Indexing",
                cat: "database",
                level: 80
            },

            {
                name: "RESTful APIs",
                cat: "backend",
                level: 90
            },
            {
                name: "Session & Cookie Handling",
                cat: "backend",
                level: 90
            },
            {
                name: "HTML5",
                cat: "frontend",
                level: 90
            },
            {
                name: "CSS3",
                cat: "frontend",
                level: 88
            },
            {
                name: "Bootstrap 5",
                cat: "frontend",
                level: 90
            },
            {
                name: "JavaScript (DOM/AJAX)",
                cat: "frontend",
                level: 82
            },
            {
                name: "Deployment & Hosting",
                cat: "devops",
                level: 80
            },
            {
                name: "Cron Jobs",
                cat: "backend",
                level: 85
            },

            {
                name: "Payment Gateway Integration",
                cat: "backend",
                level: 88
            },





        ];


        const history = [{
                title: "Podcast Streaming System",
                desc: "Secure media engine with tokenized access and auto-expiry file handling. Built with separate creator/admin logic.",
                impact: "Designed for controlled premium content access and creator-led monetization.",
                tags: ["Laravel", "MySQL", "Media Hub"]
            },
            {
                title: "E-Commerce Payment Core",
                desc: "End-to-end multi-vendor system integrating Razorpay, PayPal, and Stripe with custom checkout logic and automated status tracking.",
                impact: "Built to handle multiple payment gateways with consistent order lifecycle management.",
                tags: ["PHP", "Payments", "Dashboard"]
            },
            {
                title: "Role-Based Authentication System",
                desc: "Multi-role authentication architecture with admin, instructor, and user access control using middleware.",
                impact: "Reusable security layer applied across multiple applications.",
                tags: ["Laravel", "MVC", "Security"]
            },
            {
                title: "Custom PHP MVC Framework",
                desc: "Lightweight custom MVC framework with route-based controllers, middleware, and reusable validation layers.",
                impact: "Created to speed up development and maintain consistent architecture across projects.",
                tags: ["Core PHP", "MVC", "Architecture"]
            },
            {
                title: "Admin Management Dashboard",
                desc: "Centralized admin dashboard to manage users, partners, permissions, and system configurations.",
                impact: "Reduced operational overhead by centralizing system controls.",
                tags: ["Laravel", "Admin Panel", "Management"]
            },
            {
                title: "Stripe / Razorpay / PayPal Checkout System",
                desc: "Custom checkout implementation supporting Stripe, Razorpay, and PayPal with webhooks, refunds, and transaction logs.",
                impact: "Engineered for reliable transactions and clean financial reconciliation.",
                tags: ["Stripe", "Razorpay", "PayPal"]
            }
        ];



        // Initialization Logic
        document.addEventListener('DOMContentLoaded', () => {
            renderModules('all');
            renderHistory();
            initChart();
            setupFilters();
        });

        // Skill Filters
        function setupFilters() {
            const btns = document.querySelectorAll('.filter-btn');
            btns.forEach(btn => {
                btn.addEventListener('click', () => {
                    btns.forEach(b => {
                        b.classList.replace('btn-outline-info', 'btn-outline-secondary');
                    });
                    btn.classList.replace('btn-outline-secondary', 'btn-outline-info');
                    renderModules(btn.dataset.filter);
                });
            });
        }

        function renderModules(category) {
            const grid = document.getElementById('skills-grid');
            grid.innerHTML = '';
            const filtered = category === 'all' ? modules : modules.filter(m => m.cat === category);


            filtered.forEach(m => {
                grid.innerHTML += `
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="skill-node">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-bold small text-light">${m.name}</span>
                                <span class="x-small text-info" style="font-size: 0.6rem;">${m.cat.toUpperCase()}</span>
                            </div>
                            <div class="progress bg-dark" style="height: 2px;">
                                <div class="progress-bar" style="width: ${m.level}%; background: var(--neon-blue); box-shadow: 0 0 10px var(--neon-blue);"></div>
                            </div>
                        </div>
                    </div>
                `;
            });
        }

        function renderHistory() {
            const list = document.getElementById('projects-list');
            history.forEach((h, i) => {
                const tags = h.tags
                    .map(t =>
                        `<span class="badge border border-secondary text-secondary me-1" style="font-size: 0.7rem;">${t}</span>`
                    )
                    .join('');

                list.innerHTML += `
        <div class="project-glow-row d-md-flex align-items-center gap-5">
            <div class="flex-grow-1">
                <span class="text-info fw-bold x-small mb-2 d-block tracking-widest">
                    Development_0${i + 1}
                </span>

                <h3 class="fw-bold text-white mb-3">${h.title}</h3>

                <p class="text-secondary mb-2 small">
                    ${h.desc}
                </p>

                ${h.impact
                        ? `<p class="small fst-italic text-secondary opacity-75 mb-3">
                                           <span class="text-info">Purpose:</span> ${h.impact}
                                       </p>`
                        : ''
                    }

                <div class="d-flex flex-wrap gap-1">
                    ${tags}
                </div>
            </div>

            <div class="mt-4 mt-md-0 d-none d-sm-flex align-items-center justify-content-center"
                 style="width: 100px; height: 100px; border: 1px dashed var(--glass-border); border-radius: 15px;">
                <span class="fs-2">📁</span>
            </div>
        </div>
    `;
            });

        }

        // Charting
        function initChart() {
            const ctx = document.getElementById('skillsChart').getContext('2d');
            new Chart(ctx, {
                type: 'doughnut',
                data: {
                    labels: ['Backend Arch', 'Database Design', 'Frontend Logic', 'Security/Integrations'],
                    datasets: [{
                        data: [60, 20, 10, 10],
                        backgroundColor: ['#00f2fe', '#7000ff', '#00f5ff', '#334155'],
                        borderWidth: 0,
                        hoverOffset: 15
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '80%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: '#94a3b8',
                                padding: 25,
                                usePointStyle: true,
                                font: {
                                    size: 10
                                }
                            }
                        }
                    }
                }
            });
        }
    </script>

    <script>
        function showToast(message, type = 'success') {
            const toastEl = document.getElementById('resultToast');
            const toastBody = document.getElementById('toastMessage');

            toastEl.classList.remove('bg-success', 'bg-danger');
            toastEl.classList.add(type === 'success' ? 'bg-success' : 'bg-danger');

            toastBody.innerText = message;

            const toast = new bootstrap.Toast(toastEl, {
                delay: 3500
            });
            toast.show();
        }
    </script>

    <script>
        const form = document.getElementById('queryForm');
        const submitBtn = document.getElementById('submitBtn');

        form.addEventListener('submit', function(e) {
            e.preventDefault();

            submitBtn.disabled = true;
            submitBtn.innerText = 'Sending...';

            const formData = new FormData(form);

            fetch(form.action, {
                    method: 'POST',
                    credentials: 'same-origin',
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.status === true) {
                        showToast(data.message, 'success');
                        form.reset();
                    } else {
                        showToast(data.message, 'error');
                    }
                })
                .catch(() => {
                    showToast('Server error. Please try again.', 'error');
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerText = 'Initialize Transmission';
                });
        });
    </script>



</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mr Prabhat | Full-Stack PHP/Laravel Developer</title>
    <meta name="description"
        content="Prabhat Yadav is a full-stack PHP & Laravel developer building secure backend systems, payment integrations, admin dashboards, and scalable web applications.">
    <meta name="keywords"
        content="Prabhat Yadav, PHP Developer, Laravel Developer, Full-Stack Developer, Backend Systems, Payment Integrations, Admin Dashboards, Scalable Web Applications, Secure Authentication, Web Development, freelance developer, php freelancer, laravel freelancer, web developer for hire, 
    backend developer, startup developer, web application developer, api developer, payment gateway integration, secure web development">
    <meta name="author" content="Prabhat Yadav">
    <!-- Bootstrap 5.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css">
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;800&family=Fira+Code:wght@400;500&display=swap"
        rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
 <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            /* background-color: var(--bg-dark); */
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
    <style>
        .cyber-input::placeholder {
            color: #505050;
        }

        .resume-preview h3 {
            font-weight: 700;
        }

        .resume-preview hr {
            border-color: #00ffff;
        }

        .resume-preview {
            min-height: 400px;
        }

        .cyber-skill-card {
            background: linear-gradient(145deg, #0f172a, #1e293b);
            border-radius: 12px;
            border: 1px solid rgba(0, 255, 255, 0.2);
            transition: 0.3s ease;
        }

        .cyber-skill-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 255, 255, 0.15);
        }

        .skill-input {
            background: transparent;
            border: 1px solid rgba(0, 255, 255, 0.3);
            color: #fff;
        }

        .skill-level-controls {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .level-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            border: none;
            font-weight: bold;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s ease;
        }

        .level-btn.minus {
            background: #7f1d1d;
            color: white;
        }

        .level-btn.plus {
            background: #065f46;
            color: white;
        }

        .level-btn:hover {
            transform: scale(1.1);
        }

        .skill-stars {
            font-size: 22px;
        }

        .star {
            color: #334155;
            transition: 0.2s ease;
        }

        .star.active {
            color: #00ffff;
            text-shadow: 0 0 6px #00ffff;
        }

        .edu-card {
            background: linear-gradient(145deg, #0f172a, #1e293b);
            border-radius: 14px;
            border: 1px solid rgba(0, 255, 255, 0.15);
            transition: 0.3s ease;
        }

        .edu-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 255, 255, 0.15);
        }

        .edu-icon {
            font-size: 24px;
            width: 45px;
            height: 45px;
            background: rgba(0, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .edu-card .form-label {
            font-size: 13px;
            margin-bottom: 5px;
        }

        .job-card {
            background: linear-gradient(145deg, #0f172a, #1e293b);
            border-radius: 14px;
            border: 1px solid rgba(0, 255, 255, 0.15);
            transition: 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 25px rgba(0, 255, 255, 0.2);
        }

        .job-icon {
            font-size: 24px;
            width: 45px;
            height: 45px;
            background: rgba(0, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .job-card .form-label {
            font-size: 13px;
            margin-bottom: 5px;
        }

        input[type="file"].cyber-input {
            background: transparent;
            color: #fff;
            border: 1px solid rgba(0, 255, 255, 0.4);
            padding: 8px;
        }

        input[type="file"].cyber-input::file-selector-button {
            background: linear-gradient(135deg, #00ffff, #0ea5e9);
            border: none;
            color: #000;
            padding: 6px 12px;
            margin-right: 12px;
            border-radius: 6px;
            cursor: pointer;
            transition: 0.3s ease;
            font-weight: 600;
        }

        input[type="file"].cyber-input::file-selector-button:hover {
            background: #00ffff;
            box-shadow: 0 0 8px #00ffff;
        }

        .upload-btn {
            background: linear-gradient(135deg, #00ffff, #0ea5e9);
            color: #000;
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            display: inline-block;
        }

        .custom-tabs .nav-link {
            background: rgba(0, 255, 255, 0.1);
            border-radius: 8px;
            color: #00ffff;
            border: none;
            font-size: 13px;
            padding: 6px 12px;
        }

        .custom-tabs .nav-link.active {
            background: #00ffff;
            color: #000;
        }

        .tab-content {
            display: none;
        }

        .tab-content.active {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <style>
        #toast-container {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 9999;
        }

        .toast {
            min-width: 260px;
            margin-bottom: 14px;
            padding: 14px 18px;
            border-radius: 12px;

            background: var(--glass-bg);
            backdrop-filter: blur(10px);
            border: 1px solid var(--glass-border);

            color: #fff;
            font-weight: 500;

            opacity: 0;
            transform: translateY(20px);
            transition: opacity 0.4s ease, transform 0.4s ease;
        }

        /* ENTRY */
        .toast.show {
            animation: fadeInToast 0.4s forwards, floatToast 3s ease-in-out infinite;
            transform: translateY(0);

        }

        /* EXIT */
        .toast.hide {
            transform: translateY(-10px);
            transition: opacity 0.4s ease, transform 0.4s ease;
            animation: fadeoutToast .4s forwards;
        }

        /* Toast Fadein */
        @keyframes fadeInToast {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeoutToast {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(-10px);
            }
        }

        /* FLOATING ANIMATION */
        @keyframes floatToast {
            0% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-6px);
            }

            100% {
                transform: translateY(0);
            }
        }

        /* SUCCESS */
        .toast.success {
            color: var(--neon-blue);
            border-left: 4px solid var(--neon-blue);
            box-shadow: 0 0 15px var(--neon-blue);
        }

        /* ERROR */
        .toast.error {
            color: red;
            border-left: 4px solid red;
            box-shadow: 0 0 15px red;
        }
    </style>
    <style>
        .cyber-card {
            backdrop-filter: blur(10px);

        }

        .toggle-password {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 18px;
            user-select: none;
            color: #505050;
        }

        .toggle-password:hover {
            opacity: 0.7;
        }

        .password-field {
            padding-right: 45px;
        }
    </style>
</head>

<body>

<div class="architect-bg-base">
    <div class="architect-bg-pattern"></div>
    <div class="architect-bg-vignette"></div>
    <div class="architect-purple-accent-line"></div>
</div>
<style>

.architect-bg-base {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -10;
    background-color: var(--bg-dark); /* Foundation */
    overflow: hidden;
}

/* Add this to create the indigo glow WITHOUT covering the grid */
.architect-bg-base::after {
    content: "";
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background: radial-gradient(
        circle at 50% 50%, 
        rgba(17, 24, 39, 0.4) 0%, 
        transparent 70%
    );
    z-index: 0; /* Behind the pattern */
}

.architect-bg-pattern {
    position: absolute;
    width: 100%;
    height: 100%;
    /* Brightened lines: Using 0.07 opacity cyan instead of pure black */
    background-image: 
        linear-gradient(rgb(0 242 255 / 27%) 1px, transparent 1px), 
        linear-gradient(90deg, rgb(0 242 255 / 27%) 1px, transparent 1px);
    
    background-size: 50px 50px;
    background-position: center;
    z-index: 1;

    /* REVISED MASK: Expanded to 80% to ensure it's visible around the card */
    -webkit-mask-image: radial-gradient(
        circle at center, 
        black 40%, 
        rgba(0, 0, 0, 0.3) 80%, 
        transparent 100%
    );
    mask-image: radial-gradient(
        circle at center, 
        black 40%, 
        rgba(0, 0, 0, 0.3) 80%, 
        transparent 100%
    );
}
@keyframes grid-pulse {
    0%, 100% { opacity: 0.15; }
    50% { opacity: 0.3; }
}

.architect-bg-pattern {
    animation: grid-pulse 4s ease-in-out infinite;
}
.scan-line {
    position: absolute;
    width: 100%;
    height: 100px;
    z-index: 1;
    background: linear-gradient(
        to bottom,
        transparent,
        rgba(0, 242, 255, 0.03) 50%,
        transparent
    );
    opacity: 0.5;
    animation: scan-move 6s linear infinite;
}

@keyframes scan-move {
    0% { top: -100px; }
    100% { top: 100%; }
}


</style>
    <div class="neon-bg-wrapper">
        <div class="neon-blob blob-right"></div>
        <div class="neon-blob blob-left"></div>
    </div>
<div class="scan-line"></div>
    <div id="toast-container"></div>

    <section class="py-5">

        @yield('content')
    </section>


    <!-- Main Content -->
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




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/just-validate@latest/dist/just-validate.production.min.js"></script> --}}

    <script>
        document.querySelectorAll('.toggle-password').forEach(function(toggle) {
            toggle.addEventListener('click', function() {

                let input = this.previousElementSibling;

                if (input.type === "password") {
                    input.type = "text";
                    this.textContent = "🙈";
                } else {
                    input.type = "password";
                    this.textContent = "👁";
                }

            });
        });
    </script>

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showToast('error', @json($errors->first()));
            });
        </script>
    @endif

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Prabhat Yadav - Resume</title>
<style>

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, Helvetica, sans-serif;
    background: #eef2f7;
    padding: 40px;
}

.resume {
    max-width: 900px;
    margin: auto;
    background: #ffffff;
    box-shadow: 0 15px 40px rgba(0,0,0,0.08);
}

/* ===== Header ===== */

.header {
    background: linear-gradient(135deg, #1e3a8a, #2563eb);
    color: white;
    padding: 50px 60px;
}

.header h1 {
    font-size: 34px;
    margin-bottom: 8px;
}

.header p {
    font-size: 16px;
    opacity: 0.9;
}

.contact {
    margin-top: 15px;
    font-size: 13px;
    opacity: 0.85;
}

/* ===== Content Layout ===== */

.content {
    display: flex;
    padding: 50px 60px;
}

.left {
    width: 60%;
    padding-right: 40px;
}

.right {
    width: 40%;
}

/* ===== Sections ===== */

.section {
    margin-bottom: 35px;
}

.section h2 {
    font-size: 18px;
    color: #1e3a8a;
    margin-bottom: 15px;
    border-bottom: 2px solid #e5e7eb;
    padding-bottom: 6px;
}

.section p {
    font-size: 14px;
    line-height: 1.7;
    color: #444;
}

.job {
    margin-bottom: 20px;
}

.job h3 {
    font-size: 15px;
    margin-bottom: 4px;
}

.job span {
    font-size: 13px;
    color: #777;
}

.job ul {
    margin-top: 8px;
    padding-left: 18px;
}

.job ul li {
    font-size: 14px;
    margin-bottom: 6px;
    line-height: 1.6;
}

/* ===== Skills Box ===== */

.skill-box {
    background: #f3f4f6;
    padding: 15px;
    border-radius: 6px;
    margin-bottom: 15px;
    font-size: 14px;
}

/* ===== Highlight Card ===== */

.card {
    background: #f9fafb;
    padding: 18px;
    border-left: 4px solid #2563eb;
    margin-bottom: 20px;
}

.card h4 {
    font-size: 14px;
    margin-bottom: 5px;
}

.card p {
    font-size: 13px;
    color: #555;
}

</style>
</head>

<body>

<div class="resume">

    <div class="header">
        <h1>Prabhat Yadav</h1>
        <p>Full Stack Developer | API & Backend Specialist</p>
        <div class="contact">
            Email: prabhat@email.com | Phone: +91 XXXXX XXXXX <br>
            Portfolio: mrprabhat.com | India
        </div>
    </div>

    <div class="content">

        <!-- LEFT COLUMN -->
        <div class="left">

            <div class="section">
                <h2>Professional Summary</h2>
                <p>
                    Passionate Full Stack Developer with 3+ years of hands-on experience in building scalable web applications and secure APIs using PHP and Laravel. Specialized in backend architecture, payment integration, and performance optimization. Focused on writing clean, maintainable, production-ready code.
                </p>
            </div>

            <div class="section">
                <h2>Work Experience</h2>

                <div class="job">
                    <h3>Freelance Full Stack Developer</h3>
                    <span>2023 – Present</span>
                    <ul>
                        <li>Developed multi-role authentication systems and admin dashboards.</li>
                        <li>Integrated Stripe, Razorpay, and Omnipay payment gateways.</li>
                        <li>Built REST APIs optimized for mobile applications.</li>
                        <li>Improved database performance with advanced query tuning.</li>
                    </ul>
                </div>

                <div class="job">
                    <h3>Laravel Developer</h3>
                    <span>2022 – 2023</span>
                    <ul>
                        <li>Designed secure web applications with CSRF and session protection.</li>
                        <li>Implemented scalable MVC architecture.</li>
                        <li>Built delivery, eCommerce, and educational platforms.</li>
                    </ul>
                </div>

            </div>

        </div>

        <!-- RIGHT COLUMN -->
        <div class="right">

            <div class="section">
                <h2>Technical Skills</h2>

                <div class="skill-box">PHP & Laravel Development</div>
                <div class="skill-box">REST API Design</div>
                <div class="skill-box">MySQL & Query Optimization</div>
                <div class="skill-box">Authentication & Security</div>
                <div class="skill-box">Stripe / Razorpay Integration</div>
                <div class="skill-box">Bootstrap & UI Development</div>

            </div>

            <div class="section">
                <h2>Education</h2>

                <div class="card">
                    <h4>Bachelor’s Degree</h4>
                    <p>NEF College, Guwahati</p>
                </div>

                <div class="card">
                    <h4>Higher Secondary (10+2)</h4>
                    <p>Woodland Academy, Gorakhpur</p>
                </div>

            </div>

            <div class="section">
                <h2>Core Strengths</h2>

                <div class="skill-box">Clean Code Architecture</div>
                <div class="skill-box">Problem Solving</div>
                <div class="skill-box">API-First Development</div>
                <div class="skill-box">Fast Adaptability</div>

            </div>

        </div>

    </div>

</div>

</body>
</html>
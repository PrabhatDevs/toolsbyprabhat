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
    background: #f5f7fa;
    padding: 40px;
    color: #222;
}

.resume {
    max-width: 800px;
    margin: auto;
    background: #ffffff;
    padding: 50px;
    box-shadow: 0 8px 30px rgba(0,0,0,0.05);
}

/* Header */
.header {
    border-bottom: 3px solid #2563eb;
    padding-bottom: 20px;
    margin-bottom: 30px;
}

.header h1 {
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 5px;
}

.header p {
    font-size: 14px;
    color: #555;
}

.contact {
    margin-top: 10px;
    font-size: 13px;
    color: #666;
}

/* Sections */
.section {
    margin-bottom: 35px;
}

.section h2 {
    font-size: 18px;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
    color: #2563eb;
}

.section p {
    font-size: 14px;
    line-height: 1.7;
    margin-bottom: 10px;
}

.job {
    margin-bottom: 20px;
}

.job h3 {
    font-size: 16px;
    margin-bottom: 3px;
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

/* Skills */
.skills-list {
    display: flex;
    flex-wrap: wrap;
}

.skills-list div {
    width: 50%;
    font-size: 14px;
    margin-bottom: 8px;
}

.footer {
    margin-top: 40px;
    font-size: 12px;
    color: #888;
    text-align: center;
}

</style>
</head>

<body>

<div class="resume">

    <div class="header">
        <h1>Prabhat Yadav</h1>
        <p>Full Stack Developer | Laravel Specialist</p>
        <div class="contact">
            Email: prabhat@email.com | Phone: +91 XXXXX XXXXX <br>
            Portfolio: mrprabhat.com | Location: India
        </div>
    </div>

    <div class="section">
        <h2>Professional Summary</h2>
        <p>
            Results-driven Full Stack Developer with 3+ years of experience in building scalable web applications and REST APIs. Strong expertise in PHP, Laravel, MySQL, and payment integrations including Stripe and Razorpay. Passionate about writing clean code and optimizing performance for real-world production systems.
        </p>
    </div>

    <div class="section">
        <h2>Technical Skills</h2>
        <div class="skills-list">
            <div>• PHP & Laravel</div>
            <div>• REST API Development</div>
            <div>• MySQL & Database Optimization</div>
            <div>• JavaScript & Bootstrap</div>
            <div>• Payment Gateway Integration</div>
            <div>• Authentication & Security</div>
            <div>• MVC Architecture</div>
            <div>• Git & Deployment</div>
        </div>
    </div>

    <div class="section">
        <h2>Work Experience</h2>

        <div class="job">
            <h3>Freelance Full Stack Developer</h3>
            <span>2023 – Present</span>
            <ul>
                <li>Developed multi-role authentication systems (Admin, Instructor, Student).</li>
                <li>Built eCommerce and delivery management platforms.</li>
                <li>Integrated secure payment systems using Stripe and Razorpay.</li>
                <li>Created optimized API endpoints for mobile applications.</li>
            </ul>
        </div>

        <div class="job">
            <h3>Laravel Developer</h3>
            <span>2022 – 2023</span>
            <ul>
                <li>Designed and implemented full-stack applications from scratch.</li>
                <li>Handled server-side validation, CSRF protection, and session management.</li>
                <li>Improved database performance through query optimization.</li>
            </ul>
        </div>

    </div>

    <div class="section">
        <h2>Education</h2>

        <div class="job">
            <h3>Bachelor’s Degree</h3>
            <span>NEF College, Guwahati</span>
        </div>

        <div class="job">
            <h3>Higher Secondary (10+2)</h3>
            <span>Woodland Academy, Gorakhpur</span>
        </div>

    </div>

    <div class="footer">
        References available upon request
    </div>

</div>

</body>
</html>
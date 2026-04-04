<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Prabhat Yadav Resume</title>
    <style>
        /* PDF Page Setup - Essential for dompdf rendering */
        @page {
            margin: 0.5in;
            size: A4;
        }

        body {
            font-family: 'DejaVu Sans', sans-serif; /* Best for UTF-8 support in dompdf */
            font-size: 11px;
            line-height: 1.4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        /* ATS-Friendly Header - Simple Table Layout */
        .header-table {
            width: 100%;
            border-bottom: 1px solid #333;
            margin-bottom: 15px;
            padding-bottom: 10px;
        }

        h1 {
            font-size: 24px;
            margin: 0;
            color: #000;
            text-transform: uppercase;
        }

        .contact-info {
            text-align: right;
            font-size: 10px;
        }

        /* Section Headings - Clear and Standardized for ATS */
        h2 {
            font-size: 13px;
            border-bottom: 1px solid #999;
            padding-bottom: 2px;
            margin-top: 15px;
            margin-bottom: 8px;
            color: #000;
            text-transform: uppercase;
            font-weight: bold;
        }

        .section {
            margin-bottom: 12px;
        }

        /* Entry headers (Experience/Education) */
        .entry-header {
            width: 100%;
            margin-bottom: 2px;
        }

        .entry-title {
            font-weight: bold;
            font-size: 11px;
            color: #000;
        }

        .entry-date {
            text-align: right;
            font-style: italic;
            color: #444;
        }

        /* Skills Layout - Clean columns for parsing */
        .skills-table {
            width: 100%;
            border-collapse: collapse;
        }

        .skills-table td {
            width: 33.3%;
            padding: 2px 0;
            vertical-align: top;
        }

        ul {
            margin: 4px 0 8px 18px;
            padding: 0;
        }

        li {
            margin-bottom: 3px;
        }

        .project-item {
            margin-bottom: 10px;
        }

        .project-title {
            font-weight: bold;
            color: #000;
            display: inline-block;
        }

        /* dompdf helper to prevent orphans */
        .no-break {
            page-break-inside: avoid;
        }

        strong {
            color: #000;
        }
    </style>
</head>
<body>

    <!-- Header Section -->
    <table class="header-table">
        <tr>
            <td>
                <h1>Prabhat Yadav</h1>
                <div style="font-weight: bold; font-size: 12px; margin-top: 3px;">Full Stack Web Developer</div>
            </td>
            <td class="contact-info">
                Gorakhpur, Uttar Pradesh, India <br>
                Email: prabhat@example.com <br>
                Phone: +91-9876543210 <br>
                LinkedIn: linkedin.com/in/prabhat-yadav <br>
                Portfolio: www.mrprabhat.com
            </td>
        </tr>
    </table>

    <!-- Professional Summary -->
    <div class="section">
        <h2>Professional Summary</h2>
        <p>
            Results-driven <strong>Full Stack Developer</strong> with 3+ years of professional experience in <strong>PHP, Laravel, and MySQL</strong>. Expert in designing and deploying scalable web architectures, RESTful APIs, and secure payment integrations. Skilled in modernizing legacy systems and implementing clean-code MVC patterns to enhance performance and maintainability.
        </p>
    </div>

    <!-- Technical Skills -->
    <div class="section">
        <h2>Technical Skills</h2>
        <table class="skills-table">
            <tr>
                <td><strong>Languages:</strong> PHP, JavaScript (ES6+), SQL, HTML5, CSS3</td>
                <td><strong>Frameworks:</strong> Laravel, Bootstrap 5, jQuery</td>
                <td><strong>Database:</strong> MySQL, Eloquent ORM, Migrations</td>
            </tr>
            <tr>
                <td><strong>Tools:</strong> Git, GitHub, Composer, NPM, Postman</td>
                <td><strong>Services:</strong> REST APIs, Stripe, Razorpay</td>
                <td><strong>DevOps:</strong> Linux, Apache, Shared Hosting</td>
            </tr>
        </table>
    </div>

    <!-- Professional Experience -->
    <div class="section">
        <h2>Professional Experience</h2>

        <div class="no-break">
            <table class="entry-header">
                <tr>
                    <td class="entry-title">Freelance Full Stack Developer</td>
                    <td class="entry-date">January 2022 – Present</td>
                </tr>
            </table>
            <ul>
                <li>Architected and launched full-scale e-commerce solutions using <strong>Laravel</strong>, reducing deployment time for new features by 20%.</li>
                <li>Integrated <strong>Stripe and Razorpay API</strong> for secure payment processing, handling high-volume transaction data.</li>
                <li>Developed custom Admin Dashboards for logistics tracking and restaurant management systems.</li>
                <li>Optimized backend logic to improve server response times by 35% across multiple client projects.</li>
            </ul>
        </div>

        <div class="no-break" style="margin-top: 8px;">
            <table class="entry-header">
                <tr>
                    <td class="entry-title">PHP Developer (Project Based)</td>
                    <td class="entry-date">May 2021 – December 2022</td>
                </tr>
            </table>
            <ul>
                <li>Engineered custom <strong>MVC structures</strong> in Core PHP for specialized data management tools.</li>
                <li>Improved web security by implementing CSRF protection, data sanitization, and secure session management.</li>
                <li>Refactored complex MySQL queries and implemented database indexing, improving data retrieval efficiency.</li>
                <li>Collaborated with cross-functional teams to translate business requirements into technical specifications.</li>
            </ul>
        </div>
    </div>

    <!-- Key Projects -->
    <div class="section">
        <h2>Key Projects</h2>

        <div class="no-break project-item">
            <div><span class="project-title">Tour & Package Management System</span> | Laravel, MySQL, Bootstrap</div>
            <ul>
                <li>Developed a multi-role authentication system managing Admin, Instructor, and Student permissions.</li>
                <li>Implemented secure file upload handling and dynamic video streaming features for educational content.</li>
            </ul>
        </div>

        <div class="no-break project-item">
            <div><span class="project-title">Podcast Streaming Platform</span> | PHP, AJAX, MySQL</div>
            <ul>
                <li>Built a real-time audio player with dynamic content loading using AJAX to ensure uninterrupted streaming.</li>
                <li>Created a centralized content management system for creators to upload and manage podcast feeds.</li>
            </ul>
        </div>
    </div>

    <!-- Education -->
    <div class="section">
        <h2>Education</h2>
        <div class="no-break">
            <table class="entry-header">
                <tr>
                    <td class="entry-title">Bachelor of Computer Applications (BCA)</td>
                    <td class="entry-date">Graduated</td>
                </tr>
            </table>
            <div style="margin-left: 0px;">NEF College, Guwahati, Assam</div>
        </div>

        <div class="no-break" style="margin-top: 8px;">
            <table class="entry-header">
                <tr>
                    <td class="entry-title">Higher Secondary (Class XII)</td>
                    <td class="entry-date">Score: 66%</td>
                </tr>
            </table>
            <div style="margin-left: 0px;">Woodland Academy, Gorakhpur, Uttar Pradesh</div>
        </div>
    </div>

    <!-- Additional Information -->
    <div class="section">
        <h2>Certifications & Interests</h2>
        <ul>
            <li>Advanced Laravel & Web Security Specialization</li>
            <li>Proficient in Agile development methodologies and Git workflows.</li>
            <li>Strong interest in exploring AI integration within web applications.</li>
        </ul>
    </div>

</body>
</html>
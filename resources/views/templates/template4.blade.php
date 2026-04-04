<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modern Professional ATS Resume</title>
    <style>
        :root {
            --primary-color: #003366; /* Deep Navy */
            --text-main: #2d3748;
            --text-muted: #4a5568;
            --border-color: #cbd5e0;
            --max-width: 800px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            color: var(--text-main);
            background-color: #ffffff;
            line-height: 1.5;
            padding: 40px 20px;
        }

        .resume-container {
            max-width: var(--max-width);
            margin: 0 auto;
        }

        /* Header Styles - Left Aligned for a modern feel */
        header {
            margin-bottom: 30px;
        }

        h1 {
            color: var(--primary-color);
            font-size: 2.25rem;
            font-weight: 800;
            margin-bottom: 10px;
            letter-spacing: -0.025em;
            text-transform: none; /* More modern than all-caps */
        }

        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            font-size: 0.9rem;
            color: var(--text-main);
        }

        .contact-info span:not(:last-child)::after {
            content: "•";
            margin-left: 12px;
            color: var(--border-color);
        }

        a {
            color: var(--primary-color);
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Section Styles */
        section {
            margin-bottom: 25px;
        }

        h2 {
            font-size: 1.1rem;
            color: var(--primary-color);
            text-transform: uppercase;
            letter-spacing: 0.05em;
            border-bottom: 2px solid var(--primary-color);
            padding-bottom: 4px;
            margin-bottom: 15px;
            font-weight: 700;
        }

        /* Experience Item Styles */
        .experience-item {
            margin-bottom: 20px;
        }

        .entry-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 2px;
        }

        .entry-org {
            font-weight: 700;
            font-size: 1.1rem;
        }

        .entry-location {
            color: var(--text-muted);
            font-size: 0.9rem;
        }

        .entry-sub-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 8px;
        }

        .entry-title {
            font-style: italic;
            font-weight: 500;
            color: var(--text-muted);
        }

        .entry-date {
            font-size: 0.9rem;
            color: var(--text-muted);
        }

        /* Content Styles */
        p, ul {
            font-size: 0.95rem;
            margin-bottom: 10px;
        }

        ul {
            margin-left: 1.25rem;
        }

        li {
            margin-bottom: 5px;
        }

        .skills-container {
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .skill-group strong {
            color: var(--primary-color);
        }

        /* Print Settings */
        @media print {
            body {
                padding: 0;
            }
            .resume-container {
                max-width: 100%;
            }
            @page {
                margin: 0.5in;
            }
        }

        /* Mobile Adjustments */
        @media (max-width: 600px) {
            .entry-header, .entry-sub-header {
                flex-direction: column;
            }
            .contact-info span::after {
                display: none;
            }
            .contact-info {
                flex-direction: column;
                gap: 5px;
            }
        }
    </style>
</head>
<body>

    <div class="resume-container">
        <header>
            <h1>[YOUR NAME]</h1>
            <div class="contact-info">
                <span>[City, State, Zip]</span>
                <span>[Phone Number]</span>
                <span><a href="mailto:[Email Address]">[Email Address]</a></span>
                <span><a href="#">LinkedIn</a></span>
                <span><a href="#">Portfolio</a></span>
            </div>
        </header>

        <section class="summary">
            <h2>Professional Summary</h2>
            <p>Results-oriented [Job Title] with [Number] years of experience driving excellence in [Industry]. Expertise in [Key Area 1] and [Key Area 2], with a proven ability to lead high-performing teams and deliver [Quantifiable Result]. Committed to helping [Target Company] achieve strategic goals through innovative problem-solving and technical proficiency.</p>
        </section>

        <section>
            <h2>Professional Experience</h2>
            
            <div class="experience-item">
                <div class="entry-header">
                    <span class="entry-org">[Target Company Name]</span>
                    <span class="entry-location">[City, State]</span>
                </div>
                <div class="entry-sub-header">
                    <span class="entry-title">[Current Job Title]</span>
                    <span class="entry-date">[Month, Year] – Present</span>
                </div>
                <ul>
                    <li>Championed the development of [Project Name], resulting in a [Percentage]% increase in operational efficiency.</li>
                    <li>Orchestrated cross-functional collaboration between [Department A] and [Department B] to streamline [Process].</li>
                    <li>Negotiated vendor contracts worth $[Amount], securing a [Percentage]% cost reduction over two years.</li>
                    <li>Identified and mitigated [Specific Risk], preventing potential losses estimated at $[Amount].</li>
                </ul>
            </div>

            <div class="experience-item">
                <div class="entry-header">
                    <span class="entry-org">[Previous Company Name]</span>
                    <span class="entry-location">[City, State]</span>
                </div>
                <div class="entry-sub-header">
                    <span class="entry-title">[Previous Job Title]</span>
                    <span class="entry-date">[Month, Year] – [Month, Year]</span>
                </div>
                <ul>
                    <li>Analyzed [Data Set] to identify market trends, leading to a [Percentage]% boost in sales within 6 months.</li>
                    <li>Automated [Manual Task] using [Technology], saving the team [Number] hours of manual labor per week.</li>
                    <li>Awarded "[Award Name]" for outstanding performance and dedication to team success in [Year].</li>
                </ul>
            </div>
        </section>

        <section>
            <h2>Core Competencies</h2>
            <div class="skills-container">
                <div class="skill-group">
                    <strong>Technical Proficiency:</strong> [Skill 1], [Skill 2], [Skill 3], [Skill 4], [Skill 5]
                </div>
                <div class="skill-group">
                    <strong>Tools & Software:</strong> [Software 1], [Software 2], [Platform 1], [Language 1]
                </div>
                <div class="skill-group">
                    <strong>Industry Knowledge:</strong> [Area 1], [Area 2], [Methodology 1], [Strategy 1]
                </div>
            </div>
        </section>

        <section>
            <h2>Education</h2>
            <div class="entry-header">
                <span class="entry-org">[University Name]</span>
                <span class="entry-location">[City, State]</span>
            </div>
            <div class="entry-sub-header">
                <span class="entry-title">[Degree Name, e.g., Bachelor of Arts in Economics]</span>
                <span class="entry-date">[Year of Graduation]</span>
            </div>
            <ul>
                <li><strong>Honors:</strong> [Dean's List], [Cum Laude], [Scholarship Name]</li>
                <li><strong>Leadership:</strong> [Club President], [Volunteer Lead]</li>
            </ul>
        </section>

        <section>
            <h2>Certifications</h2>
            <ul>
                <li><strong>[Certification Name]</strong> – [Issuing Organization], [Year]</li>
                <li><strong>[Certification Name]</strong> – [Issuing Organization], [Year]</li>
            </ul>
        </section>
    </div>

</body>
</html>
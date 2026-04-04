<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATS Friendly Resume</title>
    <style>
        :root {
            --primary-text: #1a1a1a;
            --secondary-text: #4a5568;
            --accent-color: #2d3748;
            --border-color: #e2e8f0;
            --max-width: 850px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
            line-height: 1.5;
            color: var(--primary-text);
            background-color: #f7fafc;
            padding: 2rem 1rem;
            margin: 0;
            padding: 0;
        }


        .resume-container {
            max-width: var(--max-width);
            margin: 0 auto;
            background: white;
            padding: 3rem;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        /* Header Styles */
        header {
            text-align: center;
            margin-bottom: 2rem;
            border-bottom: 2px solid var(--accent-color);
            padding-bottom: 1.5rem;
        }

        h1 {
            font-size: 2.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.5rem;
            color: var(--accent-color);
        }

        .contact-info {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            font-size: 0.95rem;
            color: var(--secondary-text);
        }

        .contact-info span:not(:last-child)::after {
            content: "|";
            margin-left: 10px;
            color: var(--border-color);
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        /* Section Styles */
        section {
            margin-bottom: 2rem;
        }

        h2 {
            font-size: 1.25rem;
            text-transform: uppercase;
            border-bottom: 1px solid var(--border-color);
            margin-bottom: 1rem;
            padding-bottom: 0.25rem;
            color: var(--accent-color);
            letter-spacing: 1px;
        }

        h3 {
            font-size: 1.1rem;
            margin-bottom: 0.25rem;
        }

        .experience-item {
            margin-bottom: 1.5rem;
        }

        .experience-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            margin-bottom: 0.5rem;
            flex-wrap: wrap;
        }

        .company-info {
            font-weight: bold;
        }

        .job-title {
            font-style: italic;
            color: var(--secondary-text);
        }

        .date-location {
            color: var(--secondary-text);
            font-size: 0.9rem;
        }

        /* List Styles */
        ul {
            margin-left: 1.5rem;
            margin-bottom: 1rem;
        }

        li {
            margin-bottom: 0.4rem;
        }

        .skills-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .skills-category strong {
            display: block;
            margin-bottom: 0.25rem;
        }

        /* Print Optimization */
        @media print {
            body {
                background-color: white;
                padding: 0;
            }

            .resume-container {
                box-shadow: none;
                padding: 0;
                max-width: 100%;
            }

            header {
                border-bottom-width: 1px;
            }

            @page {
                margin: 0.5in;
            }
        }

        /* Responsive */
        @media (max-width: 640px) {
            .resume-container {
                padding: 1.5rem;
            }

            .experience-header {
                flex-direction: column;
            }

            .contact-info span::after {
                display: none;
            }

            .contact-info {
                flex-direction: column;
                align-items: center;
                gap: 5px;
            }
        }



        @page {
            padding: 20px;
        }

        h2 {
            page-break-after: avoid;
        }

        .section {
            page-break-inside: avoid;
        }

        ul {
            page-break-inside: avoid;
        }
    </style>
</head>

<body>


    <header>
        <h1>{{$name}}</h1>
        <div class="contact-info">
            <span>[City, State, Zip]</span>
            <span>[Phone Number]</span>
            <span><a href="mailto:[Email Address]">[Email Address]</a></span>
            <span><a href="#">LinkedIn</a></span>
            <span><a href="#">Portfolio</a></span>
        </div>
    </header>

    <section>
        <h2>Professional Summary</h2>
        <p>Dedicated and results-driven [Job Title] with [Number] years of experience in [Industry]. Proven track record
            of [mention a key achievement, e.g., increasing efficiency by 20% or managing budgets of $100k+]. Seeking to
            leverage expertise in [Skill A] and [Skill B] to contribute to the success of [Target Company].</p>
    </section>

    <section>
        <h2>Core Competencies</h2>
        <div class="skills-grid">
            <div class="skills-category">
                <strong>Technical Skills:</strong>
                [Skill 1], [Skill 2], [Skill 3], [Skill 4]
            </div>
            <div class="skills-category">
                <strong>Tools & Tech:</strong>
                [Software 1], [Language 2], [Platform 3]
            </div>
            <div class="skills-category">
                <strong>Soft Skills:</strong>
                [Leadership], [Strategic Planning], [Collaboration]
            </div>
        </div>
    </section>

    <section>
        <h2>Professional Experience</h2>

        <div class="experience-item">
            <div class="experience-header">
                <span class="company-info">[Target Company Name] | [City, State]</span>
                <span class="date-location">[Month, Year] – Present</span>
            </div>
            <div class="job-title">[Current Job Title]</div>
            <ul>
                <li>[Action Verb] [specific task] resulting in [quantifiable outcome, e.g., 15% growth].</li>
                <li>Developed and implemented [new process] which reduced [pain point] by [percentage/time].</li>
                <li>Collaborated with a team of [number] to deliver [project name] on schedule.</li>
                <li>Managed [specific responsibility] for a client base of [number], maintaining high satisfaction.</li>
            </ul>
        </div>

        <div class="experience-item">
            <div class="experience-header">
                <span class="company-info">[Previous Company Name] | [City, State]</span>
                <span class="date-location">[Month, Year] – [Month, Year]</span>
            </div>
            <div class="job-title">[Previous Job Title]</div>
            <ul>
                <li>Led the transition from [Old System] to [New System], improving data accuracy by [percentage].</li>
                <li>Spearheaded a [initiative name] that generated $[Amount] in additional revenue.</li>
                <li>Resolved [complex problem] by creating a [solution], which became the departmental standard.</li>
            </ul>
        </div>
    </section>

    <section>
        <h2>Education</h2>
        <div class="experience-header">
            <span class="company-info">[University Name] | [City, State]</span>
            <span class="date-location">[Month, Year of Graduation]</span>
        </div>
        <div class="job-title">[Degree Name, e.g., BS in Computer Science]</div>
        <ul>
            <li><strong>Relevant Coursework:</strong> [Course 1], [Course 2], [Course 3]</li>
            <li><strong>Honors:</strong> [Dean's List], [Scholarship Name], [GPA if > 3.5]</li>
        </ul>
    </section>

    <section>
        <h2>Certifications & Awards</h2>
        <ul>
            <li><strong>[Certification Name]</strong> – [Issuing Organization], [Year]</li>
            <li><strong>[Award Name]</strong> – [Organization], [Year]</li>
        </ul>
    </section>

    <form method="POST" action="{{ route('resume.export') }}">
        @csrf
        <input type="hidden" name="template" value="ats-standard">
        <button type="submit" class="btn btn-neon">
            Download PDF
        </button>
    </form>
</body>

</html>

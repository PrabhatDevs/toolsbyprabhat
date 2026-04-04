<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $data['basic']['first_name'] }} {{ $data['basic']['last_name'] }} - Resume</title>
    <style>
        /* CSS Reset for PDF Consistency */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', 'Helvetica', sans-serif;
            background: #ffffff;
            color: #000000;
            line-height: 1.4;
            padding: 40px;
        }

        .resume-container {
            width: 100%;
            max-width: 800px;
            margin: auto;
        }

        /* Header Section */
        header {
            margin-bottom: 20px;
        }

        header h1 {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .contact-line {
            font-size: 13px;
            margin-bottom: 4px;
        }

        .contact-line strong {
            font-weight: bold;
        }

        /* Section Styling */
        section {
            margin-top: 20px;
        }

        h2 {
            font-size: 16px;
            text-transform: uppercase;
            border-bottom: 1.5px solid #000000;
            padding-bottom: 3px;
            margin-bottom: 12px;
            letter-spacing: 0.5px;
        }

        p.content-text {
            font-size: 13.5px;
            text-align: justify;
            margin-bottom: 10px;
        }

        /* Core Competencies Pipe Style */
        .competencies-text {
            font-size: 13px;
            line-height: 1.6;
        }

        /* Technical Skills Key-Value Style */
        .skills-group {
            font-size: 13.5px;
            margin-bottom: 4px;
        }

        .skills-group strong {
            font-weight: bold;
        }

        /* Experience & Projects Entries */
        .entry {
            margin-bottom: 18px;
        }

        .entry-header {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
            font-weight: bold;
            font-size: 15px;
            margin-bottom: 2px;
        }

        .entry-subtitle {
            font-style: italic;
            font-size: 14px;
            color: #333;
            margin-bottom: 6px;
        }

        /* Professional Bullet Points */
        ul {
            padding-left: 25px;
            list-style-type: disc;
        }

        li {
            font-size: 13.5px;
            margin-bottom: 5px;
            text-align: justify;
        }

        /* Print Optimization */
        @media print {
            body {
                padding: 0;
            }

            .resume-container {
                max-width: 100%;
            }

            @page {
                margin: 1.5cm;
            }
        }

        .watermark-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            /* Sit on top of everything */
            pointer-events: none;
            /* Make it "ghost-like" to clicks */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0.5;
        }

        #downloadPdfBtn,
        .btn-neon {
            background: #000000;
            color: #00f2ff;
            /* Cyber Cyan */
            border: 2px solid #00f2ff;
            padding: 12px 24px;
            font-size: 14px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 0 10px rgba(0, 242, 255, 0.2);
            position: relative;
            overflow: hidden;
            text-decoration: none;
        }

        /* Hover State: Glowing Effect */
        #downloadPdfBtn:hover:not(:disabled) {
            background: #00f2ff;
            color: #000;
            box-shadow: 0 0 25px rgba(0, 242, 255, 0.6);
            transform: translateY(-2px);
        }

        /* Disabled/Processing State */
        #downloadPdfBtn:disabled {
            background: #1a1a1a;
            color: #555;
            border-color: #333;
            cursor: not-allowed;
            box-shadow: none;
        }

        /* Icon Animation for the 'Processing' Spinner */
        .bx-spin {
            font-size: 18px;
        }

        @media print {
            .watermark-container {
                display: none;
                /* Ensure it stays when generating PDF */
                /* position: absolute; */
            }

            /* Hide the download button and any navigation */
            #downloadPdfBtn,
            .nav-buttons {
                display: none !important;
            }


        }

        body {
            -webkit-user-select: none;
            /* Safari */
            -ms-user-select: none;
            /* IE 10 and older */
            user-select: none;
            /* Standard syntax */
        }

        /* Allow selection in input fields so users can still type their data */
        .cyber-input,
        textarea {
            -webkit-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }
    </style>
</head>

<body>
    <div class="resume-container">
        <header>
            <h1>{{ $data['basic']['first_name'] }} {{ $data['basic']['last_name'] }}</h1>
            <div class="contact-line">
                <strong>Email:</strong> {{ $data['basic']['email'] }}
                @if (!empty($data['basic']['phone']))
                    | <strong>Phone:</strong> {{ $data['basic']['phone'] }}
                @endif
            </div>
            <div class="contact-line">
                @if (!empty($data['basic']['location']))
                    <strong>Location:</strong> {{ $data['basic']['location'] }}
                @endif

                {{-- Only show Portfolio if it exists --}}
                @if (!empty($data['basic']['portfolio']))
                    | <strong>Portfolio:</strong>
                    {{ str_replace(['https://', 'www.'], '', $data['basic']['portfolio']) }}
                @endif

                {{-- Only show LinkedIn if it exists --}}
                @if (!empty($data['basic']['linkedin']))
                    | <strong>LinkedIn:</strong> {{ str_replace(['https://', 'www.'], '', $data['basic']['linkedin']) }}
                @endif

                {{-- Only show GitHub if it exists --}}
                @if (!empty($data['basic']['github']))
                    | <strong>GitHub:</strong> {{ str_replace(['https://', 'www.'], '', $data['basic']['github']) }}
                @endif
            </div>
        </header>

        @if (!empty($data['summary']))
            <section>
                <h2>Professional Summary</h2>
                <p class="content-text">
                    {{ $data['summary'] }}
                </p>
            </section>
        @endif

        @if (!empty($data['core_competencies']))
            <section>
                <h2>Core Competencies</h2>
                <p class="competencies-text">
                    {{ implode(' | ', $data['core_competencies']) }}
                </p>
            </section>
        @endif

        @if (!empty($data['skills_by_category']))
            <section>
                <h2>Expertise & Skills</h2>
                @foreach ($data['skills_by_category'] as $category => $skills)
                    <div class="skills-group">
                        <strong>{{ $category }}:</strong>
                        {{ is_array($skills) ? implode(', ', $skills) : $skills }}
                    </div>
                @endforeach
            </section>
        @endif

        @if (!empty($data['employment']))
            <section>
                <h2>Professional Experience</h2>
                @foreach ($data['employment'] as $job)
                    <div class="entry">
                        <div class="entry-header">
                            <span>{{ $job['job_title'] }}</span>
                            @if (!empty($job['duration']))
                                <span style="font-style: italic; font-weight: normal;">{{ $job['duration'] }}</span>
                            @endif
                        </div>

                        {{-- Hide subtitle row if empty --}}
                        @if (!empty($job['subtitle']))
                            <div class="entry-subtitle">{{ $job['subtitle'] }}</div>
                        @endif

                        {{-- Hide the entire UL if there are no description bullets --}}
                        @if (!empty($job['description']) && count($job['description']) > 0)
                            <ul>
                                @foreach ($job['description'] as $bullet)
                                    @if (!empty($bullet))
                                        <li>{{ $bullet }}</li>
                                    @endif
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endforeach
            </section>
        @endif

        @if (!empty($data['projects']))
            <section>
                <h2>Key Projects</h2>
                @foreach ($data['projects'] as $project)
                    <div class="entry">
                        <div class="entry-header">
                            <span>{{ $project['title'] }}</span>
                        </div>
                        <ul>
                            @foreach ($project['description'] as $desc)
                                <li>{{ $desc }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </section>
        @endif

        @if (!empty($data['education']))
            <section>
                <h2>Education</h2>
                @foreach ($data['education'] as $edu)
                    <div class="entry">
                        <div class="entry-header">
                            <span>{{ $edu['degree'] }}</span>
                            <span style="font-style: italic; font-weight: normal;">{{ $edu['duration'] }}</span>
                        </div>
                        <div class="entry-subtitle">{{ $edu['school'] }}</div>
                        <p class="content-text" style="font-size: 13px; margin-top: 4px;">{{ $edu['description'] }}</p>
                    </div>
                @endforeach
            </section>
        @endif
    </div>
    <div class="preview-actions" style="text-align: center; margin-top: 30px;">
        @php
            // Force refresh to ensure we have the most recent database values
            $user = auth()->user()->refresh();
            $remaining = $user->pdf_export_balance - $user->pdf_exports_used;
        @endphp

        @if ($remaining <= 0)
            {{-- Show this Link when credits are zero --}}
            <a href="{{ route('pricing') }}" class="btn btn-neon">
                <i class='bx bx-credit-card-front'></i> Limit Reached - Buy Credits
            </a>
        @else
            {{-- Show this Button when user has credits --}}
            <button type="button" id="downloadPdfBtn" onclick="downloadPDF()" class="btn btn-neon">
                <i class='bx bx-cloud-download'></i> Download ({{ $remaining }} left)
            </button>
        @endif
    </div>

    <div class="watermark-container">
        <svg viewBox="0 0 1000 1000" xmlns="http://www.w3.org/2000/svg">
            <text x="50%" y="50%" fill="rgba(200, 200, 200, 0.4)" text-anchor="middle" font-size="80"
                transform="rotate(-45 500 500)" style="user-select: none; -webkit-user-select: none;">
                {{ config('app.name') }} CONFIDENTIAL
            </text>
        </svg>
    </div>

    <script>
        document.addEventListener('contextmenu', function(e) {
            e.preventDefault();
            // Optional: Show a custom neon alert
            showNeonToast("Right-click is disabled for security.");
        }, false);

        function showNeonToast(message) {
            // You can use your existing cyber-styling logic here
            console.warn(message);
        }

        function downloadPDF() {
            const btn = document.getElementById('downloadPdfBtn');

            // 1. Enter Loading State
            btn.innerHTML = "<i class='bx bx-loader-alt bx-spin'></i> Processing...";
            btn.disabled = true;

            // 2. Clone the Body
            const resumeClone = document.body.cloneNode(true);

            // 3. Find and Remove UI Elements from the CLONE only
            // This protects your watermark and nav while keeping the web view intact
            const elementsToRemove = [
                '#downloadPdfBtn',
                '.watermark-container',
                '.nav-buttons',
                'script' // Crucial: Remove scripts to prevent double-execution in the PDF engine
            ];

            elementsToRemove.forEach(selector => {
                const el = resumeClone.querySelector(selector);
                if (el) el.remove();
            });

            // 4. Construct the Final HTML String
            // We include the <head> and all <style> tags to preserve your custom layout
            const allStyles = Array.from(document.querySelectorAll('style'))
                .map(style => style.innerHTML)
                .join('\n');

            const cleanHtml = `<!DOCTYPE html>
    <html>
        <head>
            <meta charset="UTF-8">
            <style>${allStyles}</style>
        </head>
        <body>
            ${resumeClone.innerHTML}
        </body>
    </html>`;

            // 5. Create and Submit the Hidden Form
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = "{{ route('resume.export') }}";

            // Append CSRF Token
            const csrfInput = document.createElement('input');
            csrfInput.type = 'hidden';
            csrfInput.name = '_token';
            csrfInput.value = '{{ csrf_token() }}';
            form.appendChild(csrfInput);

            // Append Clean HTML
            const htmlInput = document.createElement('input');
            htmlInput.type = 'hidden';
            htmlInput.name = 'resume_html';
            htmlInput.value = cleanHtml;
            form.appendChild(htmlInput);

            const rawSummary = `{{ $data['summary'] }}` || 'UNTITLED_RESUME';
const shortTitle = rawSummary
    .substring(0, 30)             // Cut string length
    .replace(/[^\w\s]/gi, '')     // Remove symbols for safety
    .trim()
    .toUpperCase() + '_V1';       // Add versioning for the "Cyber" look

// 2. Append Title Input
const titleInput = document.createElement('input');
titleInput.type = 'hidden';
titleInput.name = 'resume_title';
titleInput.value = shortTitle;
form.appendChild(titleInput);
            // 6. Execute Submission
            document.body.appendChild(form);
            form.submit();

            // Cleanup temporary form
            // Initialize this at the top of your script tag
            // 1. Refresh the user and get the numeric balance from PHP
            @php
                $user = auth()->user()->refresh();
                $balance = $user->pdf_export_balance - $user->pdf_exports_used;
            @endphp

            // 2. Assign only the number to the JS variable
            let pdfBalance = {{ $balance }};

            // Inside your existing download process
            setTimeout(() => {
                // 1. Decrement your local variable
                if (typeof pdfBalance !== 'undefined' && pdfBalance > 0) {
                    pdfBalance--;
                }

                // 2. Call the new UI Switcher
                updateDownloadButton(pdfBalance);

                // 3. Remove any temporary forms used for downloading
                if (typeof form !== 'undefined') {
                    form.remove();
                }
            }, 1000); // 1 second delay to allow the download process to finish
        }


        function updateDownloadButton(newBalance) {
            const container = document.querySelector('.preview-actions');

            if (newBalance <= 0) {
                // Switch to the 'Buy' Link
                container.innerHTML = `
            <a href="{{ route('pricing') }}" class="btn btn-neon" style="border-color: #00d2ff; color: #fff;">
                <i class='bx bx-plus-circle'></i> Limit Reached - Buy Credits
            </a>
        `;

                // Optional: Show an error toast
                if (typeof showToast === 'function') {
                    showToast('error', 'Export limit reached. Please recharge.');
                }
            } else {
                // Just update the count if they still have credits
                container.innerHTML = `
               <button type="button" id="downloadPdfBtn" onclick="downloadPDF()" class="btn btn-neon">
                <i class='bx bx-cloud-download'></i> Download (${newBalance} left)
            </button>`;
            }
        }
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms of Service | ToolsByPrabhat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --cyber-black: #0d1117;
            --cyber-card: #161b22;
            --cyber-neon: #00d4ff;
            /* Neon Blue */
            --cyber-text: #c9d1d9;
            --cyber-border: #30363d;
        }

        body {
            background-color: var(--cyber-black);
            color: var(--cyber-text);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }

        .cyber-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 20px;
        }

        .cyber-card {
            background: var(--cyber-card);
            border: 1px solid var(--cyber-border);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.5);
            position: relative;
            overflow: hidden;
        }

        .cyber-card::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
            background: var(--cyber-neon);
        }

        h1,
        h3 {
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .neon-text {
            color: var(--cyber-neon);
            text-shadow: 0 0 10px rgba(0, 212, 255, 0.3);
        }

        .section-divider {
            border-bottom: 1px solid var(--cyber-border);
            margin: 30px 0;
        }

        .badge-cyber {
            background: rgba(0, 212, 255, 0.1);
            color: var(--cyber-neon);
            border: 1px solid var(--cyber-neon);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
        }

        ul li {
            margin-bottom: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .cyber-card {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container cyber-container">
        <div class="cyber-card">
            <div class="mb-4">
                <span class="badge-cyber">LEGAL PROTOCOL V1.0</span>
                <h1 class="mt-3">Terms of <span class="neon-text">Service</span></h1>
                <p class="text-secondary small">Last Updated: April 2026</p>
            </div>

            <div class="section-divider"></div>

            <section>
                <h3>1. Scope of Services</h3>
                <p>ToolsByPrabhat ("the Platform") provides a suite of digital tools including, but not limited to:</p>
                <ul>
                    <li><strong class="neon-text">AI Resume Builder:</strong> Automated professional document
                        generation.</li>
                    <li>
                        <strong class="neon-text">Freelance Services:</strong>
                        Full-stack development, API integration, and custom software solutions tailored for clients and
                        businesses.
                    </li>
                    <li><strong class="neon-text">Digital Marketplace:</strong> Educational source code and academic
                        projects.</li>
                    <li><strong class="neon-text">AI Image Processing:</strong> BG-Remover and visual enhancement tools.
                    </li>
                </ul>
            </section>

            <section class="mt-5">
                <h3>2. Marketplace & Educational License</h3>
                <p>For all projects purchased via our marketplace (BCA, MCA, B.Tech levels):</p>
                <ul>
                    <li><strong>Reference Only:</strong> Source code is provided for <span
                            class="text-white">educational and reference purposes only</span>. We do not support or
                        encourage academic dishonesty.</li>
                    <li><strong>No Warranty:</strong> Projects are sold "as-is." While we verify quality, you are
                        responsible for local environment setup (PHP, Node, Python versions).</li>
                    <li><strong>Non-Refundable:</strong> Due to the digital nature of source code, all sales are final
                        once the download link is accessed.</li>
                </ul>
            </section>

            <section class="mt-5">
                <h3>3. AI Usage & Conduct</h3>
                <p>Users of the AI Resume Builder and BG-Remover agree to:</p>
                <ul>
                    <li><strong>No Reverse Engineering:</strong> You shall not attempt to extract our API logic, prompt
                        engineering, or underlying models.</li>
                    <li><strong>Data Ownership:</strong> You retain rights to your uploaded images/text, but grant us
                        limited license to process them for output generation.</li>
                    <li><strong>Scraping Prohibited:</strong> Use of automated bots to scrape project listings or resume
                        templates is strictly forbidden.</li>
                </ul>
            </section>

            <section class="mt-5">
                <h3>4. Account Responsibility</h3>
                <p>You are the architect of your own security. Users are solely responsible for:</p>
                <ul>
                    <li>Maintaining the confidentiality of their login credentials.</li>
                    <li>All activities that occur under their ToolsByPrabhat account.</li>
                    <li>Providing accurate data for AI-generated invoices and resumes.</li>
                </ul>
            </section>

            <div class="section-divider"></div>

            <div class="text-center">
                <p class="text-secondary small">By accessing this platform, you acknowledge you have read and agreed to
                    these terms.</p>
                <a href="/" class="btn btn-outline-info btn-sm px-4">Return to Terminal</a>
            </div>
        </div>
    </div>

</body>

</html>

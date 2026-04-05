<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Protocol | ToolsByPrabhat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --cyber-black: #0d1117;
            --cyber-card: #161b22;
            --cyber-neon: #00d4ff;
            --cyber-text: #c9d1d9;
            --cyber-border: #30363d;
            --cyber-accent: #58a6ff;
        }

        body {
            background-color: var(--cyber-black);
            color: var(--cyber-text);
            font-family: 'Segoe UI', sans-serif;
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
        }

        .cyber-card::before {
            content: "";
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;
            height: 4px;
            background: var(--cyber-neon);
        }

        h1,
        h3 {
            color: #fff;
            text-transform: uppercase;
            letter-spacing: 1.5px;
        }

        .neon-text {
            color: var(--cyber-neon);
            text-shadow: 0 0 10px rgba(0, 212, 255, 0.2);
        }

        .section-divider {
            border-bottom: 1px solid var(--cyber-border);
            margin: 30px 0;
        }

        .data-box {
            background: rgba(48, 54, 61, 0.3);
            border-left: 3px solid var(--cyber-accent);
            padding: 15px;
            margin: 15px 0;
            border-radius: 0 8px 8px 0;
        }

        .badge-status {
            background: rgba(88, 166, 255, 0.1);
            color: var(--cyber-accent);
            border: 1px solid var(--cyber-accent);
            padding: 2px 10px;
            font-size: 0.7rem;
            border-radius: 4px;
        }
    </style>
</head>

<body>

    <div class="container cyber-container">
        <div class="cyber-card">
            <div class="mb-4">
                <span class="badge-status">ENCRYPTED DATA PROTOCOL</span>
                <h1 class="mt-3">Privacy <span class="neon-text">Policy</span></h1>
                <p class="text-secondary small">Effective Date: April 2026</p>
            </div>

            <div class="section-divider"></div>

            <section>
                <h3>1. Data Acquisition</h3>
                <p>To provide high-fidelity AI tools and secure marketplace services, we process the following data
                    fragments:</p>

                <div class="data-box">
                    <strong>Identity Data:</strong> Name, email address, and account credentials required for secure
                    access to your personal dashboard.
                </div>

                <div class="data-box">
                    <strong>Hybrid Processing:</strong>
                    <span class="badge-status ms-2">INPUT-STATELESS</span>
                    <p class="mb-0 mt-2 small text-info">
                        Data provided for <span class="neon-text">AI Resume Building</span> (work history, skills) and
                        <span class="neon-text">BG-Remover</span> images are processed in real-time memory. We do not
                        store your raw inputs or use them for model training.
                    </p>
                    <p class="mb-0 mt-2 small text-white">
                        <i class="bi bi-info-circle"></i> <strong>Asset Retention:</strong> We do, however, securely
                        archive the final <span class="neon-text">Generated PDF Assets</span>. This allows you to track
                        your download history and re-download your resumes from your account at any time.
                    </p>
                </div>

                <div class="data-box">
                    <strong>Transaction Data:</strong> For project purchases and freelance service payments, data is
                    handled via encrypted <span class="neon-text">PCI-Compliant</span> gateways (Razorpay/Stripe).
                </div>
            </section>

            <section class="mt-5">
                <h3>2. How We Use Your Data</h3>
                <p>Your data is used strictly to power the tools you interact with:</p>
                <ul>
                    <li><strong>AI Processing:</strong> To generate resumes, invoices, and processed images.</li>
                    <li><strong>Digital Delivery:</strong> To verify payments and grant access to purchased source code.
                    </li>
                    <li><strong>Communication:</strong> To send transaction receipts and critical security alerts.</li>
                </ul>
            </section>

            <section class="mt-5">
                <h3>3. Data Lifecycle & <span class="neon-text">Security</span></h3>
                <p>ToolsByPrabhat utilizes a hybrid data model designed for both privacy and user convenience:</p>

                <div class="data-box">
                    <ul class="mb-0">
                        <li><strong>Input Data (Volatile):</strong> Your raw resume inputs (work history, skills) are
                            processed in real-time memory to generate your document. We do not maintain a searchable
                            database of your personal profile.</li>

                        <li class="mt-3"><strong>Generated Assets (Persistent):</strong> To ensure you don't lose your
                            work, we securely store your <span class="neon-text">Generated PDF files</span> in our
                            protected storage. This allows you to re-download your documents from your dashboard at any
                            time.</li>

                        <li class="mt-3"><strong>SSL Encryption:</strong> All data—both in transit and at rest—is
                            shielded by <span class="text-white">256-bit HTTPS (SSL)</span> encryption.</li>

                        <li class="mt-3"><strong>Payment Safety:</strong> We use tokenized payments via <span
                                class="text-white">Razorpay/Stripe</span>. Your sensitive financial credentials never
                            touch our local database.</li>
                    </ul>
                </div>
            </section>

            <section class="mt-5">
                <h3>4. Third-Party Integrations</h3>
                <p>Our ecosystem utilizes reliable third-party services to function:</p>
                <ul>
                    <li><strong>AI Models:</strong> Data sent to AI models for resume generation is anonymized where
                        possible.</li>
                    <li><strong>Analytics:</strong> We use minimal tracking to monitor server performance and load
                        times.</li>
                </ul>
            </section>

         <section class="mt-5">
    <h3>5. Data <span class="neon-text">Control</span></h3>
    <p>We respect your ownership of your digital footprint. While we do not provide automated export tools at this stage, we offer manual data management:</p>
    
    <div class="data-box border-warning">
        <ul class="mb-0 small">
            <li><strong>Manual Deletion:</strong> You may request the permanent removal of your account and all associated <span class="text-white">Generated PDF Assets</span> at any time.</li>
            <li class="mt-2"><strong>Protocol:</strong> To initiate a deletion or data inquiry, please transmit an encrypted request to <span class="neon-text">support@toolsbyprabhat.com</span> from your registered email address.</li>
            <li class="mt-2"><strong>Execution:</strong> Once verified, our system administrators will purge your records from our primary database and storage arrays within 7 business days.</li>
        </ul>
    </div>
</section>

            <div class="section-divider"></div>

            <div class="text-center">
                <p class="text-secondary small">Your privacy is the core of our system architecture.</p>
                <a href="/" class="btn btn-outline-primary btn-sm px-4">Back to Main Terminal</a>
            </div>
        </div>
    </div>

</body>

</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Protocol | ToolsByPrabhat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --cyber-black: #0d1117;
            --cyber-card: #161b22;
            --cyber-neon: #ff0055; /* Neon Red/Pink for "No Refund" Warning */
            --cyber-text: #c9d1d9;
            --cyber-border: #30363d;
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
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--cyber-neon);
        }

        h1, h3 { color: #fff; text-transform: uppercase; letter-spacing: 1.5px; }
        .neon-text { color: var(--cyber-neon); text-shadow: 0 0 10px rgba(255, 0, 85, 0.2); }
        .section-divider { border-bottom: 1px solid var(--cyber-border); margin: 30px 0; }
        
        .alert-cyber {
            background: rgba(255, 0, 85, 0.1);
            border: 1px solid var(--cyber-neon);
            color: #fff;
            padding: 20px;
            border-radius: 8px;
            margin: 20px 0;
        }
    </style>
</head>
<body>

<div class="container cyber-container">
    <div class="cyber-card">
        <div class="mb-4 text-center">
            <h1>Refund & <span class="neon-text">Cancellation</span></h1>
            <p class="text-secondary small">Policy Version: 2.1 | ToolsByPrabhat</p>
        </div>

        <div class="section-divider"></div>

        <div class="alert-cyber text-center">
            <h4 class="mb-0">⚠️ NO REFUND POLICY</h4>
            <p class="mb-0 mt-2 small">Due to the digital nature of our assets and AI-processing costs, all transactions are final.</p>
        </div>

        <section class="mt-5">
            <h3>1. Digital Assets (Project Store)</h3>
            <p>For all source code, project ZIP files, and documentation purchased for BCA/MCA/Academic reference:</p>
            <ul>
                <li>Once the payment is successful and the <span class="text-white">Download Link</span> is generated or accessed, no refunds will be issued.</li>
                <li>Digital goods are intangible and cannot be "returned." Please read the project description and view demos carefully before purchasing.</li>
            </ul>
        </section>

        <section class="mt-5">
            <h3>2. AI Processing Services</h3>
            <p>For AI Resume Building and AI BG-Remover tools:</p>
            <ul>
                <li>Each generation consumes computational resources and API credits.</li>
                <li>We do not offer refunds if you are dissatisfied with the AI's creative output or if you provided incorrect data/images for processing.</li>
            </ul>
        </section>

        <section class="mt-5">
            <h3>3. Payment Failures & Double Charges</h3>
            <p>In the event of a technical glitch where money is deducted from your account but the service is not activated:</p>
            <ul>
                <li>Please contact us at <span class="neon-text">support@toolsbyprabhat.com</span> within 24 hours.</li>
                <li>We will verify the transaction with our payment gateway (Razorpay/Stripe) and manually activate your purchase.</li>
            </ul>
        </section>

        <section class="mt-5">
            <h3>4. Cancellation</h3>
            <p>Since services are delivered instantly upon payment, there is no "window" for cancellation. Once you click 'Pay' and the transaction is authorized, the order is processed immediately.</p>
        </section>

        <div class="section-divider"></div>

        <div class="text-center">
            <a href="/" class="btn btn-outline-danger btn-sm px-4">Exit Protocol</a>
        </div>
    </div>
</div>

</body>
</html>
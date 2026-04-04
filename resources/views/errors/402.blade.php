<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>402 | SUBSCRIPTION_REQUIRED</title>
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>

<body class="cyber-bg" style="background: transparent">
    <div class="error-wrapper" style="background: transparent">
        <div class="glitch-box">
            <h1 class="error-code" data-text="402">402</h1>
            <div class="scanline"></div>
        </div>

        <h2 class="status-title">INSUFFICIENT_CREDITS_DETECTED</h2>

        <div class="terminal-box" style="background: transparent">
            <p class="typing" style="background: transparent">> WHY: Your current data-export quota has been fully consumed.</p>
            <p class="typing" style="background: transparent">> FIX: Recharge your account or upgrade your subscription tier.</p>
            <p class="typing" style="background: transparent">> NOTE: Premium access is required to unlock further generations.</p>
        </div>
        
        <div class="action-area">
            <a href="{{ url('/pricing') }}" class="btn-neon">
                <span class="btn-text">RECHARGE_CREDITS</span>
                <span class="btn-glitch"></span>
            </a>
            <a href="{{ url('/') }}" class="btn-outline">RETURN_TO_CORE</a>
        </div>
    </div>

    <div class="bg-grid"></div>
</body>

</html>
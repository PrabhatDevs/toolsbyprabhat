<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>429 | RATE_LIMIT_EXCEEDED</title>
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>

<body class="cyber-bg" style="background: transparent">
    <div class="error-wrapper" style="background: transparent">
        <div class="glitch-box">
            <h1 class="error-code" data-text="429">429</h1>
            <div class="scanline"></div>
        </div>

        <h2 class="status-title">SYSTEM_OVERLOAD_DETECTED</h2>

        <div class="terminal-box" style="background: transparent">
            <p class="typing" style="background: transparent">> WHY: You are sending too many requests to the core server.</p>
            <p class="typing" style="background: transparent">> FIX: Please wait a few moments before trying again.</p>
            <p class="typing" style="background: transparent">> NOTE: Rate limiting is active to ensure system stability.</p>
        </div>
        
        <div class="action-area">
            <a href="{{ url()->current() }}" class="btn-neon">
                <span class="btn-text">RETRY_IN_60_SECONDS</span>
                <span class="btn-glitch"></span>
            </a>
            <a href="{{ url('/') }}" class="btn-outline">RETURN_TO_CORE</a>
        </div>
    </div>

    <div class="bg-grid"></div>
</body>

</html>
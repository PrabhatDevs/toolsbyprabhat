<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>419 | SESSION_TERMINATED</title>
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>

<body class="cyber-bg" style="background: transparent">
    <div class="error-wrapper" style="background: transparent">
        <div class="glitch-box">
            <h1 class="error-code" data-text="419">419</h1>
            <div class="scanline"></div>
        </div>

        <h2 class="status-title">YOUR_SESSION_HAS_TIMED_OUT</h2>

        <div class="terminal-box" style="background: transparent">
            <p class="typing" style="background: transparent">> WHY: You were away for too long or your security token expired.</p>
            <p class="typing" style="background: transparent">> FIX: Click 'Sync Session' below and try submitting your form again.</p>
            <p class="typing" style="background: transparent">> NOTE: This keeps your data safe from unauthorized access.</p>
        </div>
        <div class="action-area">
            <a href="{{ url()->previous() }}" class="btn-neon">
                <span class="btn-text">SYNC_SESSION</span>
                <span class="btn-glitch"></span>
            </a>
            <a href="{{ url('/') }}" class="btn-outline">RETURN_TO_CORE</a>
        </div>
    </div>
    <div class="bg-grid"></div>
</body>

</html>

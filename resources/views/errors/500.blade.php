<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 | SYSTEM_CRITICAL_FAILURE</title>
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>

<body class="cyber-bg" style="background: transparent">
    <div class="error-wrapper" style="background: transparent">
        <div class="glitch-box">
            <h1 class="error-code code-red" data-text="500">500</h1>
            <div class="scanline"></div>
        </div>

        <h2 class="status-title title-red">CRITICAL_SERVER_ERR_DETECTED</h2>

        <div class="terminal-box" style="background: transparent">
            <p class="typing" style="background: transparent">> WHY: The server encountered an unexpected glitch in the mainframe.</p>
            <p class="typing" style="background: transparent">> FIX: Our engineers have been alerted. Try refreshing in a moment.</p>
            <p class="typing" style="background: transparent">> ERR_LOG: INTERNAL_CORE_FAILURE_SEC_05</p>
        </div>
        
        <div class="action-area">
            <a href="{{ url()->current() }}" class="btn-neon">
                <span class="btn-text">RETRY_CONNECTION</span>
                <span class="btn-glitch"></span>
            </a>
            <a href="{{ url('/') }}" class="btn-outline">RETURN_TO_CORE</a>
        </div>
    </div>
    <div class="bg-grid"></div>
</body>

</html>
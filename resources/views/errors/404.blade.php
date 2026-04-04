<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | SIGNAL_LOST</title>
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>
<body class="cyber-bg" style="background: transparent">
    <div class="error-wrapper" style="background: transparent">
        <div class="glitch-box">
            <h1 class="error-code code-cyan" data-text="404">404</h1>
            <div class="scanline"></div>
        </div>
        
        <h2 class="status-title title-cyan">DATA_PACKET_NOT_FOUND</h2>
        
        <div class="terminal-box" style="background: transparent">
            <p class="typing" style="background: transparent">> WHY: The requested coordinate does not exist in our database.</p>
            <p>> STACK_TRACE: NULL_POINTER_EXCEPTION</p>
            <p class="typing" style="background: transparent">> ACTION: Verify the URL or return to the main dashboard.</p>
        </div>

        <div class="action-area">
            <a href="{{ url('/') }}" class="btn-neon">
                <span class="btn-text">REBOOT_TO_CORE</span>
                <span class="btn-glitch"></span>
            </a>
            <a href="{{ url()->previous() }}" class="btn-outline">GO_BACK</a>
        </div>
    </div>

    <div class="bg-grid"></div>
</body>
</html>
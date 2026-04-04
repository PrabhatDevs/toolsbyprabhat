<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>400 | INVALID_TEMPLATE_LINK</title>
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>

<body class="cyber-bg" style="background: transparent">
    <div class="error-wrapper" style="background: transparent">
        <div class="glitch-box">
            <h1 class="error-code" data-text="400">400</h1>
            <div class="scanline"></div>
        </div>

        <h2 class="status-title">INVALID_TEMPLATE_DETECTION</h2>

        <div class="terminal-box" style="background: transparent">
            <p class="typing" style="background: transparent">> WHY: The template link provided is invalid or has been tampered with.</p>
            <p class="typing" style="background: transparent">> STATUS: CHECKSUM_MISMATCH</p>
            <p class="typing" style="background: transparent">> NOTE: This sector is restricted to verified blueprint links only.</p>
        </div>
        
        <div class="action-area">
            <a href="{{ url()->previous() ?? route('tools') }}" class="btn-neon">
                <span class="btn-text">RETURN_TO_TOOLS</span>
                <span class="btn-glitch"></span>
            </a>
            <a href="{{ url('/') }}" class="btn-outline">REBOOT_TO_CORE</a>
        </div>
    </div>

    <div class="bg-grid"></div>
</body>

</html>
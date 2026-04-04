<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>503 | SYSTEM_OFFLINE</title>
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>

<body class="cyber-bg" style="background: transparent">
    <div class="error-wrapper" style="background: transparent">
        <div class="glitch-box">
            <h1 class="error-code" data-text="503">503</h1>
            <div class="scanline"></div>
        </div>

        <h2 class="status-title">CORE_SYSTEM_MAINTENANCE</h2>

        <div class="terminal-box" style="background: transparent">
            <p class="typing" style="background: transparent">> WHY: The mainframe is currently undergoing scheduled hardware updates.</p>
            <p class="typing" style="background: transparent">> FIX: We will be back online shortly. Please do not disconnect.</p>
            <p class="typing" style="background: transparent">> STATUS: INSTALLING_PATCH_V2.0.4</p>
        </div>
        
        <div class="action-area">
            <a href="{{ url()->current() }}" class="btn-neon">
                <span class="btn-text">RETRY_CONNECTION</span>
                <span class="btn-glitch"></span>
            </a>
            {{-- <a href="https://twitter.com/your_handle" class="btn-outline">CHECK_STATUS_FEED</a> --}}
        </div>
    </div>

    <div class="bg-grid"></div>
</body>

</html>
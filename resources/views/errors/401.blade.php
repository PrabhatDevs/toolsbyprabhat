<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>401 | ACCESS_DENIED</title>
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}">
       <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>

<body class="cyber-bg" style="background: transparent">
    <div class="error-wrapper" style="background: transparent">
        <div class="glitch-box">
            <h1 class="error-code" data-text="401">401</h1>
            <div class="scanline"></div>
        </div>

        <h2 class="status-title">UNAUTHORIZED_ACCESS_DETECTED</h2>

        <div class="terminal-box" style="background: transparent">
            <p class="typing" style="background: transparent">> WHY: Your security credentials were not found or are invalid.</p>
            <p class="typing" style="background: transparent">> FIX: Please log in to your account to verify your identity.</p>
            <p class="typing" style="background: transparent">> NOTE: This sector is restricted to authorized personnel only.</p>
        </div>
        
        <div class="action-area">
            <a href="{{ route('login') }}" class="btn-neon">
                <span class="btn-text">SIGN_IN_TO_CORE</span>
                <span class="btn-glitch"></span>
            </a>
            <a href="{{ url('/') }}" class="btn-outline">RETURN_TO_HOME</a>
        </div>
    </div>

    <div class="bg-grid"></div>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 | ACCESS_FORBIDDEN</title>
    <link rel="stylesheet" href="{{ asset('css/errors.css') }}"> 
      <link rel="icon" type="image/x-icon" href="{{ asset('images/icons/mrprabhat-bg-logo.png') }}">
</head>

<body class="cyber-bg" style="background: transparent">
    <div class="error-wrapper" style="background: transparent">
        <div class="glitch-box">
            <h1 class="error-code" data-text="403">403</h1>
            <div class="scanline"></div>
        </div>

        <h2 class="status-title">SECURITY_BREACH_PREVENTED</h2>

        <div class="terminal-box" style="background: transparent">
            <p class="typing" style="background: transparent">> WHY: You do not have the required clearance for this data sector.</p>
            <p class="typing" style="background: transparent">> FIX: Return to authorized zones or contact an administrator.</p>
            <p class="typing" style="background: transparent">> NOTE: All unauthorized access attempts are logged for security.</p>
        </div>
        
        <div class="action-area">
            <a href="{{ url('/') }}" class="btn-neon">
                <span class="btn-text">RETURN_TO_SAFE_ZONE</span>
                <span class="btn-glitch"></span>
            </a>
            <a href="{{ url()->previous() }}" class="btn-outline">GO_BACK</a>
        </div>
    </div>

    <div class="bg-grid"></div>
</body>

</html>
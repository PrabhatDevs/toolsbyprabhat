<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
</head>
<body style="margin: 0; padding: 0; background-color: #0d1117; font-family: 'Segoe UI', Helvetica, Arial, sans-serif;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #0d1117; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #161b22; border: 1px solid #00f2ff33; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 242, 255, 0.1);">
                    
                    <tr>
                        <td style="padding: 30px; background: linear-gradient(90deg, #0d1117 0%, #00f2ff1a 100%); border-bottom: 1px solid #00f2ff33;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 20px; letter-spacing: 2px; text-transform: uppercase;">
                                {{ config('app.name') }}_<span style="color: #00f2ff;">ARCHITECT</span>
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px; color: #c9d1d9;">
                            @yield('content')
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px 40px; background-color: #0d1117; text-align: center;">
                            <p style="font-size: 11px; color: #484f58; margin: 0; text-transform: uppercase; letter-spacing: 1px;">
                                &copy; {{ date('Y') }} {{ config('app.name') }} | Gorakhpur HQ // System Verified
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Access Required</title>
</head>
<body style="margin: 0; padding: 0; font-family: 'Segoe UI', Helvetica, Arial, sans-serif;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #0d1117; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #161b22; border: 1px solid #00f2ff33; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 242, 255, 0.1);">
                    
                    <tr>
                        <td style="padding: 30px; background: linear-gradient(90deg, #0d1117 0%, #00f2ff1a 100%); border-bottom: 1px solid #00f2ff33;">
                            <h1 style="margin: 0; color: #ffffff; font-size: 20px; letter-spacing: 2px; text-transform: uppercase;">
                                AI_<span style="color: #00f2ff;">ARCHITECT</span>
                            </h1>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px; color: #c9d1d9;">
                            <h2 style="color: #ffffff; font-size: 24px; margin-top: 0; margin-bottom: 20px;">SYSTEM_ACCESS_REQUIRED</h2>
                            
                            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 10px;">Hello <strong>{{ $user->name }}</strong>,</p>
                            
                            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 30px;">
                                To activate your <span style="color: #00f2ff; font-weight: bold;">5 Smart Credits</span> and initiate your first AI-driven Resume Analysis, the system requires a verified digital signature.
                            </p>

                            <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 30px;">
                                <tr>
                                    <td align="center" style="border-radius: 4px;" bgcolor="#00f2ff">
                                        <a href="{{ $url }}" target="_blank" style="font-size: 14px; font-weight: bold; color: #0d1117; text-decoration: none; padding: 15px 30px; border-radius: 4px; display: inline-block; letter-spacing: 1px;">
                                            AUTHORIZE ACCOUNT
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p style="font-size: 14px; color: #8b949e; line-height: 1.5; border-top: 1px solid #30363d; padding-top: 20px; margin-top: 20px;">
                                <strong style="color: #ff4d4d;">CRITICAL:</strong> This authorization link will self-destruct in <strong>60 minutes</strong>. If you did not initiate this request, please ignore this transmission.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px 40px; background-color: #0d1117; text-align: center;">
                            <p style="font-size: 11px; color: #484f58; margin: 0; text-transform: uppercase; letter-spacing: 1px;">
                                &copy; {{ date('Y') }} AI Architect Portfolio Systems | Gorakhpur HQ
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
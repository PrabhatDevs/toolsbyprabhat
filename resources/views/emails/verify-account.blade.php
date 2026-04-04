<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>System Access Required</title>
</head>
<body style="margin: 0; padding: 0; background-color: #030712; font-family: 'Segoe UI', Helvetica, Arial, sans-serif;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="background-color: #030712; padding: 20px;">
        <tr>
            <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0" style="max-width: 600px; background-color: #0d1117; border: 1px solid #7000ff33; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 25px rgba(112, 0, 255, 0.15);">
                    
                    <tr>
                        <td style="padding: 25px 30px; background: linear-gradient(90deg, #7000ff1a 0%, #00f2fe1a 100%); border-bottom: 1px solid #00f2fe33;">
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td width="50" style="vertical-align: middle;">
                                        <img src="{{ asset('images/icons/mrprabhat-logo.png') }}" alt="Icon"
                                            width="45"
                                            style="display: block; border: 0; filter: drop-shadow(0 0 8px #00f1fe2d);">
                                    </td>
                                    <td style="vertical-align: middle; padding-left: 15px;">
                                        <h1 style="margin: 0; color: #ffffff; font-size: 22px; font-weight: 700; letter-spacing: 1px; font-family: 'Segoe UI', Arial, sans-serif;">
                                            Toolsby<span style="color: #00f2fe;">Prabhat</span>
                                        </h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px; color: #c9d1d9;">
                            <h2 style="color: #ffffff; font-size: 24px; margin-top: 0; margin-bottom: 20px; letter-spacing: 1px;">SYSTEM_ACCESS_REQUIRED</h2>
                            
                            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 10px;">Hello <strong>{{ $user->name ?? 'User Name' }}</strong>,</p>
                            
                            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 30px;">
                                To activate your <span style="color: #00f2fe; font-weight: bold;">5 Smart Credits</span> and initiate your first AI-driven Resume Builder, the system requires a verified digital signature.
                            </p>

                            <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 30px;">
                                <tr>
                                    <td align="center" style="border-radius: 4px; background: linear-gradient(135deg, #7000ff 0%, #00f2fe 100%);">
                                        <a href="{{ $url ?? '#' }}" target="_blank" style="font-size: 14px; font-weight: bold; color: #ffffff; text-decoration: none; padding: 15px 35px; border-radius: 4px; display: inline-block; letter-spacing: 1px;">
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
                        <td style="padding: 20px 40px; background-color: #030712; text-align: center; border-top: 1px solid #7000ff22;">
                            <p style="font-size: 11px; color: #4b5563; margin: 0; text-transform: uppercase; letter-spacing: 1px;">
                                &copy; {{ date('Y') }} ToolsByPrabhat Portfolio Systems | System Access: Pending
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
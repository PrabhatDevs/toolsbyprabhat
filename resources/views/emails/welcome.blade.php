<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Activated</title>
</head>

<body style="margin: 0; padding: 0; background-color: #030712; font-family: 'Segoe UI', Helvetica, Arial, sans-serif;">
    <table width="100%" border="0" cellspacing="0" cellpadding="0"
        style="background-color: #030712; padding: 40px 20px;">
        <tr>
            <td align="center">
                <table width="100%" border="0" cellspacing="0" cellpadding="0"
                    style="max-width: 600px; background-color: #0d1117; border: 1px solid #7000ff33; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 25px rgba(112, 0, 255, 0.15);">

                    <tr>
                        <td
                            style="padding: 25px 30px; background: linear-gradient(90deg, #7000ff1a 0%, #00f2fe1a 100%); border-bottom: 1px solid #00f2fe33;">
                            <table border="0" cellspacing="0" cellpadding="0" width="100%">
                                <tr>
                                    <td width="50" style="vertical-align: middle;">
                                        <img src="{{ asset('images/icons/mrprabhat-logo.png') }}" alt="Icon"
                                            width="45"
                                            style="display: block; border: 0;">
                                    </td>

                                    <td style="vertical-align: middle; padding-left: 15px;">
                                        <h1
                                            style="margin: 0; color: #ffffff; font-size: 22px; font-weight: 700; letter-spacing: 1px; font-family: 'Segoe UI', Arial, sans-serif;">
                                            Toolsby<span style="color: #00f2fe;">Prabhat</span>
                                        </h1>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 0; background-color: #0d1117;">
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 40px; color: #c9d1d9;">
                            <h2
                                style="color: #00f2fe; font-size: 24px; margin-top: 0; margin-bottom: 20px; text-shadow: 0 0 10px rgba(0, 242, fe, 0.2);">
                                IDENTITY_CONFIRMED</h2>

                            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 10px;">Welcome to the Terminal,
                                <strong>{{ $user->name ?? '' }}</strong>.
                            </p>

                            <p style="font-size: 16px; line-height: 1.6; margin-bottom: 25px;">
                                Your digital signature has been verified. As part of your onboarding, your account has
                                been provisioned with:
                            </p>

                            <div
                                style="background-color: #030712; border: 1px solid #7000ff66; border-radius: 4px; padding: 20px; margin-bottom: 30px; box-shadow: inset 0 0 10px rgba(112, 0, 255, 0.1);">
                                <p
                                    style="margin: 0; font-size: 14px; color: #00f2fe; font-weight: bold; letter-spacing: 1px;">
                                    > 5 SMART_CREDITS: [ACTIVE] <br>
                                    > AI_RESUME_BUILDER: [UNLOCKED] <br>
                                    > SYSTEM_ACCESS: [FULL]
                                </p>
                            </div>

                            <table border="0" cellspacing="0" cellpadding="0" style="margin-bottom: 30px;">
                                <tr>
                                    <td align="center" style="border-radius: 4px; background: linear-gradient(135deg, #7000ff 0%, #00f2fe 100%);">
                                        <a href="{{ route('tools.resume.builder') }}" target="_blank"
                                            style="font-size: 14px; font-weight: bold; color: #ffffff; text-decoration: none; padding: 15px 35px; border-radius: 4px; display: inline-block; letter-spacing: 1px;">
                                            LAUNCH BUILDER
                                        </a>
                                    </td>
                                </tr>
                            </table>

                            <p
                                style="font-size: 14px; color: #8b949e; line-height: 1.5; border-top: 1px solid #30363d; padding-top: 20px; margin-top: 20px;">
                                <strong>NOTE:</strong> You can now use your credits to run deep-scan analyses on your
                                resume or generate professional resume.
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 20px 40px; background-color: #030712; text-align: center; border-top: 1px solid #7000ff22;">
                            <p
                                style="font-size: 11px; color: #4b5563; margin: 0; text-transform: uppercase; letter-spacing: 1px;">
                                &copy; {{ date('Y') }} ToolsByPrabhat Portfolio Systems | System Access: Verified
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
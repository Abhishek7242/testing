<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to {{ config('app.name') }}</title>
    <style>
        /* Base Reset */
        body {
            font-family: 'Segoe UI', user-select, sans-serif;
            background-color: #f1f5f9;
            /* Slate 100 */
            margin: 0;
            padding: 0;
            -webkit-text-size-adjust: none;
            width: 100% !important;
        }

        /* Container */
        .wrapper {
            width: 100%;
            table-layout: fixed;
            background-color: #f1f5f9;
            padding-bottom: 40px;
        }

        .main-content {
            background-color: #ffffff;
            margin: 0 auto;
            width: 100%;
            max-width: 600px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            border: 1px solid #e2e8f0;
            /* Slate 200 */
        }

        /* Header */
        .header {
            background: linear-gradient(135deg, #6366f1 0%, #a855f7 100%);
            /* Indigo to Purple */
            padding: 40px 20px;
            text-align: center;
        }

        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 0.5px;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* Body */
        .body-section {
            padding: 40px 40px;
            color: #334155;
            /* Slate 700 */
            font-size: 16px;
            line-height: 1.6;
        }

        .welcome-text {
            margin-bottom: 24px;
            font-size: 18px;
            color: #1e293b;
            /* Slate 800 */
        }

        /* Credentials Box */
        .credentials-box {
            background-color: #f8fafc;
            /* Slate 50 */
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            padding: 24px;
            margin: 32px 0;
        }

        .credential-row {
            margin-bottom: 12px;
            display: block;
        }

        .credential-row:last-child {
            margin-bottom: 0;
        }

        .label {
            font-weight: 600;
            color: #64748b;
            /* Slate 500 */
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            display: inline-block;
            width: 80px;
        }

        .value {
            color: #0f172a;
            /* Slate 900 */
            font-weight: 500;
            font-family: 'Consolas', 'Monaco', monospace;
            background: #e0e7ff;
            /* Indigo 100 */
            padding: 2px 6px;
            border-radius: 4px;
            color: #4338ca;
            /* Indigo 700 */
        }

        .role-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 12px;
            font-weight: 600;
            background-color: #f3e8ff;
            /* Purple 100 */
            color: #7e22ce;
            /* Purple 700 */
            text-transform: capitalize;
        }

        /* CTA Button */
        .btn-container {
            text-align: center;
            margin-top: 32px;
            margin-bottom: 32px;
        }

        .btn {
            background-color: #4f46e5;
            /* Indigo 600 */
            color: #ffffff !important;
            padding: 14px 32px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            box-shadow: 0 4px 6px -1px rgba(79, 70, 229, 0.2);
            display: inline-block;
            transition: all 0.2s;
        }

        .btn:hover {
            background-color: #4338ca;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            color: #94a3b8;
            /* Slate 400 */
            font-size: 14px;
        }

        /* Mobile */
        @media only screen and (max-width: 600px) {
            .main-content {
                width: 100% !important;
                border-radius: 0;
            }

            .body-section {
                padding: 30px 20px;
            }
        }
    </style>
</head>

<body>
    <div class="wrapper">
        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td align="center" style="padding-top: 40px;">
                    <div class="main-content">
                        <!-- Header -->
                        <div class="header">
                            <h1>{{ config('app.name') }}</h1>
                        </div>

                        <!-- Body -->
                        <div class="body-section">
                            <p class="welcome-text"><strong>Hello, {{ $user->name }}!</strong></p>

                            <p>We are thrilled to welcome you to the team. Your admin account has been successfully
                                created and is ready for use.</p>

                            <p>Here are your secure login credentials:</p>

                            <div class="credentials-box">
                                <div class="credential-row">
                                    <span class="label">Email</span>
                                    <span class="value">{{ $user->email }}</span>
                                </div>
                                <div class="credential-row" style="margin-top: 16px;">
                                    <span class="label">Role</span>
                                    <span class="role-badge">{{ $user->role }}</span>
                                </div>
                            </div>

                            <div class="btn-container">
                                <a href="{{ route('admin.login', ['email' => $user->email, 'p' => base64_encode($password)]) }}"
                                    class="btn">Login to Dashboard</a>
                            </div>

                            <p style="font-size: 14px; color: #64748b;">
                                For your security, please update your password immediately after logging in for the
                                first time.
                            </p>

                            <p style="margin-top: 30px;">
                                Best regards,<br>
                                <strong>The {{ config('app.name') }} Team</strong>
                            </p>
                        </div>
                    </div>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <div class="footer">
                        <p>&copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                        <p>If you have any questions, feel free to reply to this email.</p>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>

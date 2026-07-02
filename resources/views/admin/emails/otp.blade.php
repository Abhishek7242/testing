<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: sans-serif;
            background-color: #f1f5f9;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
        }

        .otp {
            font-size: 32px;
            font-weight: bold;
            letter-spacing: 5px;
            color: #6366f1;
            margin: 20px 0;
        }

        p {
            color: #64748b;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Verify Your Account</h2>
        <p>Use the following OTP to complete your password change and activate your account.</p>
        <div class="otp">{{ $otp }}</div>
        <p>This code triggers account activation.</p>
    </div>
</body>

</html>

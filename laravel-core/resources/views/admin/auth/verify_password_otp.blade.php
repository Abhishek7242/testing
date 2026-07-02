@extends('admin.layouts.app')

@section('title', 'Verify OTP')

@section('content')
    <div class="login-container">
        <!-- Background Animation -->
        <div class="background-animate">
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>
        </div>

        <!-- Verification Card -->
        <div class="login-card">
            <div class="card-header">
                <div class="brand-logo">
                    <i class="fa-solid fa-envelope-open-text"></i>
                </div>
                <h2>Check Your Email</h2>
                <p>We've sent a 6-digit code to <strong>{{ Auth::user()->email }}</strong></p>
            </div>

            <!-- OTP Form -->
            <form id="otpVerifyForm" class="login-form">
                @csrf
                <div class="otp-inputs">
                    <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                    <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                    <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                    <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                    <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                    <input type="text" maxlength="1" pattern="[0-9]" inputmode="numeric" required>
                </div>
                <input type="hidden" name="otp" id="full_otp">

                <button type="submit" class="btn-login" id="verifyBtn">
                    <span>Verify & Update Password</span>
                    <i class="fa-solid fa-check-double"></i>
                </button>
            </form>

            <div class="card-footer">
                <p class="text-sm text-slate-400">Didn't receive code? <a href="#" onclick="resendOtp()"
                        class="text-indigo-400 hover:text-indigo-300 font-medium">Resend</a></p>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

        :root {
            --primary: #6366f1;
            --bg-dark: #0f172a;
            --card-bg: rgba(30, 41, 59, 0.7);
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --border-color: rgba(255, 255, 255, 0.1);
            --glass-border: 1px solid rgba(255, 255, 255, 0.1);
            --input-bg: rgba(15, 23, 42, 0.6);
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-dark);
            color: var(--text-main);
        }

        .login-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            padding: 2rem;
            z-index: 1;
        }

        .background-animate {
            position: absolute;
            inset: 0;
            z-index: -1;
            overflow: hidden;
        }

        .orb {
            position: absolute;
            border-radius: 50%;
            filter: blur(80px);
            opacity: 0.6;
            animation: float 10s infinite ease-in-out;
        }

        .orb-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, #4f46e5, transparent 70%);
            top: -100px;
            left: -100px;
        }

        .orb-2 {
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, #a855f7, transparent 70%);
            bottom: -50px;
            right: -50px;
            animation-delay: -2s;
        }

        .orb-3 {
            width: 200px;
            height: 200px;
            background: radial-gradient(circle, #ec4899, transparent 70%);
            top: 40%;
            left: 30%;
            animation-delay: -5s;
            opacity: 0.3;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(30px, -30px);
            }
        }

        .login-card {
            width: 100%;
            max-width: 420px;
            background: var(--card-bg);
            backdrop-filter: blur(20px);
            border: var(--glass-border);
            border-radius: 24px;
            padding: 40px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        .card-header {
            text-align: center;
            margin-bottom: 32px;
        }

        .brand-logo {
            width: 64px;
            height: 64px;
            background: linear-gradient(135deg, var(--primary), #a855f7);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 28px;
            color: white;
            box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.4);
        }

        .card-header h2 {
            font-size: 28px;
            font-weight: 700;
            margin: 0 0 8px;
        }

        .card-header p {
            color: var(--text-muted);
            font-size: 15px;
            margin: 0;
        }

        .otp-inputs {
            display: flex;
            gap: 10px;
            justify-content: center;
            margin-bottom: 30px;
        }

        .otp-inputs input {
            width: 45px;
            height: 55px;
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            text-align: center;
            font-size: 24px;
            font-weight: 700;
            color: white;
            outline: none;
            transition: all 0.3s;
        }

        .otp-inputs input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            background: rgba(15, 23, 42, 0.8);
            transform: translateY(-2px);
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, var(--primary), #4f46e5);
            color: white;
            padding: 14px;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            transition: all 0.3s;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.3);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(79, 70, 229, 0.4);
        }

        .card-footer {
            text-align: center;
            margin-top: 32px;
            border-top: 1px solid var(--border-color);
            padding-top: 20px;
        }
    </style>

    <script>
        const inputs = document.querySelectorAll('.otp-inputs input');
        const fullOtpInput = document.getElementById('full_otp');
        const otpVerifyForm = document.getElementById('otpVerifyForm');
        const verifyBtn = document.getElementById('verifyBtn');

        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                e.target.value = e.target.value.replace(/[^0-9]/g, '');
                if (e.target.value && index < inputs.length - 1) inputs[index + 1].focus();
                updateFullOtp();
            });
            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value && index > 0) inputs[index - 1].focus();
            });
        });

        function updateFullOtp() {
            fullOtpInput.value = Array.from(inputs).map(i => i.value).join('');
        }

        otpVerifyForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            if (fullOtpInput.value.length !== 6) {
                alert('Please enter 6-digit OTP');
                return;
            }
            verifyBtn.disabled = true;
            verifyBtn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Verifying...';
            try {
                const response = await fetch("{{ route('admin.password.update') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: new FormData(otpVerifyForm)
                });
                const data = await response.json();
                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    alert(data.message || 'Invalid OTP');
                    verifyBtn.disabled = false;
                    verifyBtn.innerHTML =
                        '<span>Verify & Update Password</span> <i class="fa-solid fa-check-double"></i>';
                }
            } catch (error) {
                alert('Something went wrong');
                verifyBtn.disabled = false;
                verifyBtn.innerHTML =
                    '<span>Verify & Update Password</span> <i class="fa-solid fa-check-double"></i>';
            }
        });

        function resendOtp() {
            alert('Resend feature not implemented in this demo, but the route exists in controller!');
        }
    </script>
@endsection

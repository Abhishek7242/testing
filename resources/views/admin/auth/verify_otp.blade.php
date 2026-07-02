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
                    <i class="fa-solid fa-envelope-circle-check"></i>
                </div>
                <h2>Verify OTP</h2>
                <p>We've sent a 6-digit verification code to your email.</p>
            </div>

            <!-- OTP Form -->
            <form id="otpForm" class="login-form">
                @csrf
                <div class="input-group">
                    <label for="otp">Verification Code</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-key input-icon"></i>
                        <input type="text" name="otp" id="otp" placeholder="XXXXXX" maxlength="6" required
                            class="text-center tracking-widest text-xl">
                    </div>
                </div>

                <button type="submit" class="btn-login" id="verifyBtn">
                    <span>Verify & Activate</span>
                    <i class="fa-solid fa-check"></i>
                </button>
            </form>

            <div class="card-footer">
                <a href="{{ route('admin.activate') }}" class="text-sm text-slate-400 hover:text-white">Change Password</a>
            </div>
        </div>
    </div>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap');

        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
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
            position: relative;
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

        .input-group {
            margin-bottom: 20px;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: var(--text-muted);
            margin-bottom: 8px;
            margin-left: 4px;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748b;
            font-size: 16px;
        }

        .input-wrapper input {
            width: 100%;
            background: var(--input-bg);
            border: 1px solid var(--border-color);
            border-radius: 12px;
            padding: 14px 16px 14px 44px;
            color: var(--text-main);
            font-size: 15px;
            outline: none;
            transition: all 0.3s;
            font-family: inherit;
        }

        .input-wrapper input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
            background: rgba(15, 23, 42, 0.8);
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
            margin-top: 10px;
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
        const otpForm = document.getElementById('otpForm');
        const verifyBtn = document.getElementById('verifyBtn');

        function setButtonLoading(btn, isLoading) {
            if (isLoading) {
                btn.dataset.originalText = btn.innerHTML;
                btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Verifying...';
                btn.disabled = true;
                btn.style.opacity = '0.7';
            } else {
                if (btn.dataset.originalText) btn.innerHTML = btn.dataset.originalText;
                btn.disabled = false;
                btn.style.opacity = '1';
            }
        }

        otpForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(otpForm);
            setButtonLoading(verifyBtn, true);

            try {
                const response = await fetch("{{ route('admin.activate.verify') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    window.location.href = data.redirect;
                } else {
                    let errorMessage = 'Verification failed.';
                    if (data.errors) {
                        errorMessage = Object.values(data.errors).flat().join('\n');
                    }
                    alert(errorMessage);
                    setButtonLoading(verifyBtn, false);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Verification failed. Please try again.');
                setButtonLoading(verifyBtn, false);
            }
        });
    </script>
@endsection

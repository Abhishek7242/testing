@extends('admin.layouts.app')

@section('title', 'Activate Account')

@section('content')
    <div class="login-container">
        <!-- Background Animation -->
        <div class="background-animate">
            <div class="orb orb-1"></div>
            <div class="orb orb-2"></div>
            <div class="orb orb-3"></div>
        </div>

        <!-- Activation Card -->
        <div class="login-card">
            <div class="card-header">
                <div class="brand-logo">
                    <i class="fa-solid fa-shield-halved"></i>
                </div>
                <h2>Activate Account</h2>
                <p>Please set a new password to activate your account.</p>
            </div>

            <!-- Password Form -->
            <form id="activationForm" class="login-form">
                @csrf
                <div class="input-group">
                    <label for="password">New Password</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" name="password" id="password" placeholder="Min 8 characters" required>
                        <button type="button" class="toggle-password" onclick="togglePassword('password', 'eyeIcon1')">
                            <i class="fa-regular fa-eye" id="eyeIcon1"></i>
                        </button>
                    </div>
                </div>

                <div class="input-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <div class="input-wrapper">
                        <i class="fa-solid fa-lock input-icon"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            placeholder="Confirm password" required>
                        <button type="button" class="toggle-password"
                            onclick="togglePassword('password_confirmation', 'eyeIcon2')">
                            <i class="fa-regular fa-eye" id="eyeIcon2"></i>
                        </button>
                    </div>
                    <span id="matchMessage" class="match-message"></span>
                </div>

                <button type="submit" class="btn-login" id="sendOtpBtn">
                    <span>Next</span>
                    <i class="fa-solid fa-arrow-right"></i>
                </button>
            </form>

            <div class="card-footer">
                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="text-sm text-slate-400 hover:text-white">Back to Login</a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="hidden">@csrf</form>
            </div>
        </div>
    </div>

    <style>
        /* Reuse Login Styles */
        /* ... (Same as login.blade.php mostly) ... */
        /* Add specific modal styles if needed */
        /* Include the CSS from login page here for consistency or verify it's in layout */
        /* Assuming layout handles base styles, but keeping the specific ones from login page would be good if not global */
        /* For brevity, relying on user checking login.blade.php styles.
                                                       But to be safe, I'll copy the necessary CSS blocks if they aren't global.
                                                       Based on previous file view, they were inline in login.blade.php.
                                                       I should include them here to ensure styling matches. */

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
            overflow: hidden;
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

        .input-wrapper input:focus+.input-icon {
            color: var(--primary);
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
            background: linear-gradient(135deg, #4f46e5, #4338ca);
        }

        .card-footer {
            text-align: center;
            margin-top: 32px;
            border-top: 1px solid var(--border-color);
            padding-top: 20px;
        }

        .toggle-password {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 0;
            font-size: 16px;
            transition: color 0.3s;
        }

        .toggle-password:hover {
            color: var(--text-main);
        }

        .input-wrapper input.input-match-success {
            border-color: #10b981 !important;
            /* Green for success */
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
        }

        .input-wrapper input.input-match-error {
            border-color: #ef4444 !important;
            /* Red for error */
            box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
        }

        .match-message {
            font-size: 12px;
            margin-top: 5px;
            margin-left: 4px;
            display: none;
        }

        .match-message.success {
            display: block;
            color: #10b981;
        }

        .match-message.error {
            display: block;
            color: #ef4444;
        }
    </style>

    <script>
        function togglePassword(inputId, iconId) {
            const passwordInput = document.getElementById(inputId);
            const eyeIcon = document.getElementById(iconId);

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        const activationForm = document.getElementById('activationForm');
        const sendOtpBtn = document.getElementById('sendOtpBtn');

        function setButtonLoading(btn, isLoading) {
            if (isLoading) {
                const originalText = btn.innerHTML;
                btn.dataset.originalText = originalText;
                btn.innerHTML = '<i class="fa-solid fa-circle-notch fa-spin"></i> Processing...';
                btn.disabled = true;
                btn.style.opacity = '0.7';
                btn.style.cursor = 'not-allowed';
            } else {
                if (btn.dataset.originalText) {
                    btn.innerHTML = btn.dataset.originalText;
                }
                btn.disabled = false;
                btn.style.opacity = '1';
                btn.style.cursor = 'pointer';
            }
        }

        activationForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            // Check password match before submitting
            const password = document.getElementById('password').value;
            const confirm = document.getElementById('password_confirmation').value;
            if (password !== confirm) {
                alert('Passwords do not match!');
                return;
            }

            const formData = new FormData(activationForm);
            setButtonLoading(sendOtpBtn, true);

            try {
                const response = await fetch("{{ route('admin.activate.initiate') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: formData
                });

                const data = await response.json();

                if (data.success) {
                    // Redirect to OTP Verification page
                    window.location.href = data.redirect;
                } else {
                    let errorMessage = 'Something went wrong.';
                    if (data.errors) {
                        errorMessage = Object.values(data.errors).flat().join('\n');
                    } else if (data.message) {
                        errorMessage = data.message;
                    }
                    alert('Error:\n' + errorMessage);
                }
            } catch (error) {
                console.error('Error:', error);
                alert('Something went wrong. Please try again.');
            } finally {
                setButtonLoading(sendOtpBtn, false);
            }
        });

        const passwordInput = document.getElementById('password');
        const confirmInput = document.getElementById('password_confirmation');
        const matchMessage = document.getElementById('matchMessage');

        function checkPasswordMatch() {
            const password = passwordInput.value;
            const confirm = confirmInput.value;

            // Reset classes
            confirmInput.classList.remove('input-match-success', 'input-match-error');
            matchMessage.className = 'match-message';
            matchMessage.textContent = '';

            if (confirm.length === 0) return;

            if (password === confirm) {
                confirmInput.classList.add('input-match-success');
                matchMessage.classList.add('success');
                matchMessage.textContent = 'Passwords match';
            } else {
                confirmInput.classList.add('input-match-error');
                matchMessage.classList.add('error');
                matchMessage.textContent = 'Passwords do not match';
            }
        }

        passwordInput.addEventListener('input', checkPasswordMatch);
        confirmInput.addEventListener('input', checkPasswordMatch);
    </script>
@endsection

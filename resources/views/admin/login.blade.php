<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Sofinish Technologies</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --blue-600: #2563eb;
            --blue-700: #1d4ed8;
            --blue-50: #eff6ff;
            --teal-600: #0891b2;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-700: #334155;
            --gray-900: #0f172a;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: var(--gray-900);
            position: relative;
        }
        .login-container {
            width: 100%;
            max-width: 440px;
        }
        .login-card {
            background: #ffffff;
            border: 1px solid var(--gray-200);
            border-radius: 20px;
            padding: 44px 38px;
            box-shadow: 0 10px 40px rgba(15, 23, 42, 0.06);
        }
        .login-brand {
            text-align: center;
            margin-bottom: 30px;
        }
        .brand-logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 26px;
            font-weight: 700;
            color: var(--gray-900);
            text-decoration: none;
            margin-bottom: 12px;
        }
        .brand-logo img {
            width: 44px;
            height: 44px;
            border-radius: 10px;
        }
        .brand-logo span span {
            color: var(--blue-600);
        }
        .login-brand h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--gray-900);
        }
        .login-brand p {
            color: var(--gray-500);
            font-size: 13.5px;
            margin-top: 4px;
        }
        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fecaca;
            color: #dc2626;
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13.5px;
        }
        .alert-info {
            background: var(--blue-50);
            border: 1px solid #bfdbfe;
            color: var(--blue-600);
            padding: 12px 16px;
            border-radius: 10px;
            margin-bottom: 22px;
            font-size: 13.5px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--gray-700);
            margin-bottom: 8px;
        }
        .form-control {
            width: 100%;
            background: #ffffff;
            border: 1px solid var(--gray-300);
            border-radius: 10px;
            padding: 12px 16px;
            color: var(--gray-900);
            font-family: 'Inter', sans-serif;
            font-size: 14.5px;
            outline: none;
            transition: all 0.2s ease;
        }
        .form-control:focus {
            border-color: var(--blue-600);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
        }
        .form-control::placeholder {
            color: var(--gray-400);
        }

        /* Password input group with Eye Icon */
        .password-input-group {
            position: relative;
            display: flex;
            align-items: center;
        }
        .password-input-group .form-control {
            padding-right: 46px;
        }
        .btn-toggle-eye {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: transparent;
            border: none;
            color: #64748b;
            cursor: pointer;
            padding: 6px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 6px;
            transition: color 0.2s, background 0.2s;
        }
        .btn-toggle-eye:hover {
            color: var(--blue-600);
            background: #f1f5f9;
        }

        .form-meta {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 24px;
            font-size: 13px;
        }
        .remember-checkbox {
            display: flex;
            align-items: center;
            gap: 8px;
            color: var(--gray-600);
            cursor: pointer;
        }
        .remember-checkbox input {
            cursor: pointer;
            accent-color: var(--blue-600);
        }
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, var(--blue-600) 0%, var(--teal-600) 100%);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            padding: 14px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 15.5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-login:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.35);
        }
        .back-to-site {
            text-align: center;
            margin-top: 22px;
        }
        .back-to-site a {
            color: var(--gray-500);
            font-size: 13px;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-to-site a:hover {
            color: var(--gray-900);
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="login-card">
        <div class="login-brand">
            <a href="{{ route('home') }}" class="brand-logo">
                <img src="{{ asset('images/logo.png') }}" alt="Sofinish">
                <span>Sofin<span>ish</span></span>
            </a>
            <h2>Admin Control Center</h2>
            <p>Enter your credentials to access the dashboard</p>
        </div>

        @if(session('info'))
            <div class="alert-info">{{ session('info') }}</div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST" autocomplete="off">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Email Address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    class="form-control" 
                    placeholder="Enter your email" 
                    value="" 
                    autocomplete="off" 
                    required 
                    autofocus
                >
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="password-input-group">
                    <input 
                        type="password" 
                        id="password" 
                        name="password" 
                        class="form-control" 
                        placeholder="Enter your password" 
                        value="" 
                        autocomplete="new-password" 
                        required
                    >
                    <button type="button" class="btn-toggle-eye" id="togglePasswordBtn" onclick="togglePasswordVisibility()" title="Show/Hide Password" aria-label="Toggle password visibility">
                        <!-- Eye Icon (Password Hidden) -->
                        <svg id="eyeIcon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                            <circle cx="12" cy="12" r="3"/>
                        </svg>
                        <!-- Eye-Off Icon (Password Visible) -->
                        <svg id="eyeOffIcon" width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" style="display: none;">
                            <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"/>
                            <line x1="1" y1="1" x2="23" y2="23"/>
                        </svg>
                    </button>
                </div>
            </div>

            <div class="form-meta">
                <label class="remember-checkbox">
                    <input type="checkbox" name="remember" value="1">
                    <span>Remember me on this device</span>
                </label>
            </div>

            <button type="submit" class="btn-login">
                <span>Sign In</span>
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </form>
    </div>

    <div class="back-to-site">
        <a href="{{ route('home') }}">← Return to Frontend Website</a>
    </div>
</div>

<script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        const eyeOffIcon = document.getElementById('eyeOffIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            eyeIcon.style.display = 'none';
            eyeOffIcon.style.display = 'block';
        } else {
            passwordInput.type = 'password';
            eyeIcon.style.display = 'block';
            eyeOffIcon.style.display = 'none';
        }
    }
</script>

</body>
</html>

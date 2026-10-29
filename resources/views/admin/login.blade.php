<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login | Sofinish Technologies</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --navy: #0a1628;
            --deep-blue: #0d2137;
            --blue-600: #2563eb;
            --teal-500: #0891b2;
            --teal-300: #22d3ee;
            --white: #ffffff;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
        }
        body {
            font-family: 'Inter', sans-serif;
            background: radial-gradient(circle at top right, #1e3a8a 0%, #0a1628 50%, #06111f 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, rgba(8, 145, 178, 0.25) 0%, transparent 70%);
            top: -150px;
            left: -150px;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }
        body::after {
            content: '';
            position: absolute;
            width: 450px;
            height: 450px;
            background: radial-gradient(circle, rgba(37, 99, 235, 0.2) 0%, transparent 70%);
            bottom: -100px;
            right: -100px;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }
        .login-container {
            width: 100%;
            max-width: 460px;
            position: relative;
            z-index: 2;
        }
        .login-card {
            background: rgba(15, 23, 42, 0.85);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 24px;
            padding: 44px 38px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(20px);
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
            color: var(--white);
            text-decoration: none;
            margin-bottom: 12px;
        }
        .brand-logo img {
            width: 44px;
            height: 44px;
            border-radius: 10px;
        }
        .brand-logo span span {
            color: var(--teal-300);
        }
        .login-brand h2 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 600;
            color: var(--gray-300);
        }
        .login-brand p {
            color: var(--gray-400);
            font-size: 13.5px;
            margin-top: 4px;
        }
        .alert-danger {
            background: rgba(239, 68, 68, 0.15);
            border: 1px solid rgba(239, 68, 68, 0.35);
            color: #fca5a5;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 22px;
            font-size: 13.5px;
        }
        .alert-info {
            background: rgba(8, 145, 178, 0.15);
            border: 1px solid rgba(34, 211, 238, 0.3);
            color: #a5f3fc;
            padding: 12px 16px;
            border-radius: 12px;
            margin-bottom: 22px;
            font-size: 13.5px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 13px;
            font-weight: 500;
            color: var(--gray-300);
            margin-bottom: 8px;
        }
        .input-wrapper {
            position: relative;
        }
        .form-control {
            width: 100%;
            background: rgba(10, 22, 40, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.15);
            border-radius: 12px;
            padding: 13px 16px;
            color: var(--white);
            font-family: 'Inter', sans-serif;
            font-size: 14.5px;
            outline: none;
            transition: all 0.25s ease;
        }
        .form-control:focus {
            border-color: var(--teal-300);
            box-shadow: 0 0 0 3px rgba(8, 145, 178, 0.25);
            background: rgba(13, 33, 55, 0.95);
        }
        .form-control::placeholder {
            color: var(--gray-500);
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
            color: var(--gray-400);
            cursor: pointer;
        }
        .remember-checkbox input {
            cursor: pointer;
            accent-color: var(--teal-500);
        }
        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, var(--teal-500) 0%, var(--blue-600) 100%);
            color: var(--white);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 15.5px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.25s ease;
            box-shadow: 0 10px 25px rgba(8, 145, 178, 0.35);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            filter: brightness(1.1);
            box-shadow: 0 15px 35px rgba(8, 145, 178, 0.5);
        }
        .demo-cred-hint {
            margin-top: 24px;
            padding: 14px;
            border-radius: 12px;
            background: rgba(30, 58, 138, 0.25);
            border: 1px dashed rgba(59, 130, 246, 0.3);
            text-align: center;
            font-size: 12.5px;
            color: var(--gray-300);
        }
        .demo-cred-hint strong {
            color: var(--teal-300);
            cursor: pointer;
            text-decoration: underline;
        }
        .back-to-site {
            text-align: center;
            margin-top: 20px;
        }
        .back-to-site a {
            color: var(--gray-400);
            font-size: 13px;
            text-decoration: none;
            transition: color 0.2s;
        }
        .back-to-site a:hover {
            color: var(--white);
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
            <p>Access real-time analytics & visitor intelligence</p>
        </div>

        @if(session('info'))
            <div class="alert-info">{{ session('info') }}</div>
        @endif

        @if($errors->any())
            <div class="alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Admin Email</label>
                <div class="input-wrapper">
                    <input type="email" id="email" name="email" class="form-control" placeholder="admin@sofinish.co.uk" value="{{ old('email', 'admin@sofinish.co.uk') }}" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <div class="input-wrapper">
                    <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" value="admin123" required>
                </div>
            </div>

            <div class="form-meta">
                <label class="remember-checkbox">
                    <input type="checkbox" name="remember" value="1" checked>
                    <span>Remember me</span>
                </label>
            </div>

            <button type="submit" class="btn-login">
                <span>Sign in to Dashboard</span>
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
            </button>
        </form>

        <div class="demo-cred-hint">
            Default credentials: <br>
            Email: <strong onclick="document.getElementById('email').value='admin@sofinish.co.uk'">admin@sofinish.co.uk</strong> &bull; 
            Pass: <strong onclick="document.getElementById('password').value='admin123'">admin123</strong>
        </div>
    </div>

    <div class="back-to-site">
        <a href="{{ route('home') }}">← Return to Frontend Website</a>
    </div>
</div>

</body>
</html>

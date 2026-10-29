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
            max-width: 450px;
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
        .demo-cred-hint {
            margin-top: 24px;
            padding: 14px;
            border-radius: 10px;
            background: var(--blue-50);
            border: 1px dashed #bfdbfe;
            text-align: center;
            font-size: 12.5px;
            color: var(--gray-700);
        }
        .demo-cred-hint strong {
            color: var(--blue-600);
            cursor: pointer;
            text-decoration: underline;
        }
        .back-to-site {
            text-align: center;
            margin-top: 20px;
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
            <p>Access real-time analytics & visitor intelligence</p>
        </div>

        @if(session('info'))
            <div class="alert-info">{{ session('info') }}</div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('admin.login.post') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="form-label" for="email">Admin Email</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="admin@sofinish.co.uk" value="{{ old('email', 'admin@sofinish.co.uk') }}" required autofocus>
            </div>

            <div class="form-group">
                <label class="form-label" for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" value="admin123" required>
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

        
    </div>

    <div class="back-to-site">
        <a href="{{ route('home') }}">← Return to Frontend Website</a>
    </div>
</div>

</body>
</html>

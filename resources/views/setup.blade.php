<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Auto-Setup & Migrations | Sofinish Technologies</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Space+Grotesk:wght@600;700&display=swap" rel="stylesheet">
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #0a1628 0%, #0d2137 60%, #0891b2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #ffffff;
            padding: 30px 20px;
        }
        .setup-card {
            background: rgba(15, 23, 42, 0.88);
            border: 1px solid rgba(255, 255, 255, 0.14);
            border-radius: 24px;
            max-width: 680px;
            width: 100%;
            padding: 44px;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(20px);
        }
        .setup-header {
            text-align: center;
            margin-bottom: 35px;
        }
        .setup-logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            font-family: 'Space Grotesk', sans-serif;
            font-size: 24px;
            font-weight: 700;
            color: #ffffff;
            margin-bottom: 15px;
        }
        .setup-logo img {
            width: 44px;
            height: 44px;
            border-radius: 10px;
        }
        .setup-header h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 8px;
            background: linear-gradient(135deg, #60a5fa 0%, #22d3ee 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .setup-header p {
            color: #94a3b8;
            font-size: 14.5px;
        }
        .step-list {
            display: flex;
            flex-direction: column;
            gap: 16px;
            margin-bottom: 35px;
        }
        .step-item {
            background: rgba(10, 22, 40, 0.7);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 14px;
            padding: 16px 20px;
            display: flex;
            align-items: flex-start;
            gap: 16px;
        }
        .step-item.success {
            border-color: rgba(16, 185, 129, 0.35);
            background: rgba(16, 185, 129, 0.08);
        }
        .step-item.error {
            border-color: rgba(239, 68, 68, 0.35);
            background: rgba(239, 68, 68, 0.08);
        }
        .step-icon {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 14px;
            font-weight: 700;
        }
        .step-item.success .step-icon {
            background: #10b981;
            color: #ffffff;
        }
        .step-item.error .step-icon {
            background: #ef4444;
            color: #ffffff;
        }
        .step-item.info .step-icon {
            background: #0891b2;
            color: #ffffff;
        }
        .step-content h3 {
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 4px;
            color: #f1f5f9;
        }
        .step-content p {
            font-size: 13px;
            color: #94a3b8;
            line-height: 1.5;
        }
        .credentials-box {
            background: rgba(30, 58, 138, 0.25);
            border: 1px solid rgba(59, 130, 246, 0.3);
            border-radius: 14px;
            padding: 20px;
            margin-bottom: 30px;
        }
        .credentials-box h4 {
            font-size: 14px;
            color: #93c5fd;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .cred-row {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            margin-bottom: 8px;
            padding-bottom: 8px;
            border-bottom: 1px dashed rgba(255, 255, 255, 0.1);
        }
        .cred-row:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }
        .cred-label {
            color: #94a3b8;
        }
        .cred-value {
            font-family: monospace;
            font-weight: 600;
            color: #22d3ee;
            background: rgba(0, 0, 0, 0.25);
            padding: 2px 8px;
            border-radius: 4px;
        }
        .actions-row {
            display: flex;
            gap: 16px;
        }
        @media (max-width: 580px) {
            .actions-row {
                flex-direction: column;
            }
        }
        .btn-action {
            flex: 1;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 14px 24px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 15px;
            text-decoration: none;
            transition: all 0.25s ease;
        }
        .btn-primary-action {
            background: linear-gradient(135deg, #0891b2 0%, #2563eb 100%);
            color: #ffffff;
            box-shadow: 0 10px 25px rgba(8, 145, 178, 0.35);
        }
        .btn-primary-action:hover {
            transform: translateY(-2px);
            filter: brightness(1.1);
        }
        .btn-secondary-action {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.15);
            color: #ffffff;
        }
        .btn-secondary-action:hover {
            background: rgba(255, 255, 255, 0.15);
        }
    </style>
</head>
<body>

<div class="setup-card">
    <div class="setup-header">
        <div class="setup-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Sofinish">
            <span>Sofinish Technologies</span>
        </div>
        <h1>Database Live Setup Complete</h1>
        <p>Live server tables, schema migrations, and admin access initialized.</p>
    </div>

    <div class="step-list">
        @foreach($steps as $step)
            <div class="step-item {{ $step['status'] }}">
                <div class="step-icon">
                    @if($step['status'] === 'success') ✓
                    @elseif($step['status'] === 'error') ✕
                    @else ℹ
                    @endif
                </div>
                <div class="step-content">
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['desc'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    <div class="credentials-box">
        <h4>Default Admin Credentials</h4>
        <div class="cred-row">
            <span class="cred-label">Login URL</span>
            <span class="cred-value">{{ url('/admin/login') }}</span>
        </div>
        <div class="cred-row">
            <span class="cred-label">Admin Email</span>
            <span class="cred-value">admin@sofinish.co.uk</span>
        </div>
        <div class="cred-row">
            <span class="cred-label">Password</span>
            <span class="cred-value">admin123</span>
        </div>
        <div class="cred-row">
            <span class="cred-label">Active Connection</span>
            <span class="cred-value">{{ strtoupper($connectionType) }}</span>
        </div>
    </div>

    <div class="actions-row">
        <a href="{{ route('admin.login') }}" class="btn-action btn-primary-action">
            <span>Login to Admin Panel →</span>
        </a>
        <a href="{{ route('home') }}" class="btn-action btn-secondary-action">
            <span>Go to Website Frontend</span>
        </a>
    </div>
</div>

</body>
</html>

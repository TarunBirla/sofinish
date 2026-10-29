<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') | Sofinish Technologies</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Chart.js for high-fidelity interactive graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --navy-dark: #070f1e;
            --navy: #0a1628;
            --deep-blue: #0d2137;
            --card-bg: rgba(15, 23, 42, 0.75);
            --card-border: rgba(255, 255, 255, 0.09);
            --blue-800: #1e3a8a;
            --blue-600: #2563eb;
            --blue-400: #60a5fa;
            --teal-500: #0891b2;
            --teal-400: #06b6d4;
            --teal-300: #22d3ee;
            --emerald-500: #10b981;
            --amber-500: #f59e0b;
            --red-500: #ef4444;
            --white: #ffffff;
            --gray-100: #f1f5f9;
            --gray-200: #e2e8f0;
            --gray-300: #cbd5e1;
            --gray-400: #94a3b8;
            --gray-500: #64748b;
            --gray-600: #475569;
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #070f1e;
            color: var(--gray-100);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar */
        .admin-sidebar {
            width: 270px;
            background: linear-gradient(180deg, #0a1628 0%, #06111f 100%);
            border-right: 1px solid var(--card-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            transition: all 0.3s ease;
        }
        .sidebar-brand {
            padding: 24px 20px;
            border-bottom: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
        }
        .sidebar-logo {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: var(--navy);
        }
        .sidebar-logo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .sidebar-brand-name {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 19px;
            font-weight: 700;
            color: var(--white);
        }
        .sidebar-brand-name span {
            color: var(--teal-300);
        }

        .sidebar-nav {
            padding: 20px 14px;
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 6px;
            overflow-y: auto;
        }
        .nav-label {
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--gray-500);
            padding: 10px 12px 6px;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: var(--radius-sm);
            color: var(--gray-300);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sidebar-link svg {
            width: 19px;
            height: 19px;
            color: var(--gray-400);
            transition: color 0.2s ease;
        }
        .sidebar-link:hover {
            color: var(--white);
            background: rgba(255, 255, 255, 0.05);
        }
        .sidebar-link:hover svg {
            color: var(--teal-300);
        }
        .sidebar-link.active {
            color: var(--white);
            background: linear-gradient(135deg, rgba(8, 145, 178, 0.25) 0%, rgba(37, 99, 235, 0.25) 100%);
            border: 1px solid rgba(34, 211, 238, 0.3);
            font-weight: 600;
        }
        .sidebar-link.active svg {
            color: var(--teal-300);
        }
        .sidebar-badge {
            margin-left: auto;
            background: var(--blue-600);
            color: var(--white);
            font-size: 11.5px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 999px;
        }
        .sidebar-badge.unread {
            background: var(--red-500);
            box-shadow: 0 0 10px rgba(239, 68, 68, 0.5);
        }

        .sidebar-footer {
            padding: 18px 16px;
            border-top: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(0, 0, 0, 0.2);
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--teal-500), var(--blue-600));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: var(--white);
        }
        .user-meta h4 {
            font-size: 13px;
            font-weight: 600;
            color: var(--white);
        }
        .user-meta span {
            font-size: 11px;
            color: var(--gray-400);
        }
        .btn-logout {
            background: transparent;
            border: none;
            color: var(--gray-400);
            cursor: pointer;
            padding: 6px;
            border-radius: 6px;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }
        .btn-logout:hover {
            color: var(--red-500);
            background: rgba(239, 68, 68, 0.1);
        }

        /* Main Content */
        .admin-main {
            margin-left: 270px;
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: #070f1e;
        }
        .admin-topbar {
            height: 72px;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: rgba(10, 22, 40, 0.7);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid var(--card-border);
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .topbar-title h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--white);
        }
        .topbar-title p {
            font-size: 12.5px;
            color: var(--gray-400);
        }
        .topbar-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }
        .live-status-pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 14px;
            background: rgba(16, 185, 129, 0.12);
            border: 1px solid rgba(16, 185, 129, 0.3);
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            color: #34d399;
        }
        .pulse-dot {
            width: 8px;
            height: 8px;
            background: #10b981;
            border-radius: 50%;
            box-shadow: 0 0 8px #10b981;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.7); }
            70% { transform: scale(1); box-shadow: 0 0 0 6px rgba(16, 185, 129, 0); }
            100% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }

        .btn-topbar {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            padding: 8px 14px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 500;
            text-decoration: none;
            color: var(--gray-200);
            background: rgba(255, 255, 255, 0.06);
            border: 1px solid var(--card-border);
            transition: all 0.2s;
        }
        .btn-topbar:hover {
            background: rgba(255, 255, 255, 0.12);
            color: var(--white);
        }

        .admin-content {
            padding: 32px;
            flex: 1;
        }

        /* Global Toast / Alerts */
        .toast-banner {
            padding: 14px 20px;
            border-radius: 12px;
            margin-bottom: 24px;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .toast-success {
            background: rgba(16, 185, 129, 0.15);
            border: 1px solid rgba(16, 185, 129, 0.35);
            color: #6ee7b7;
        }

        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }
            .admin-sidebar.show {
                transform: translateX(0);
            }
            .admin-main {
                margin-left: 0;
            }
            .admin-topbar {
                padding: 0 18px;
            }
            .admin-content {
                padding: 18px;
            }
        }
    </style>
    @yield('extra_css')
</head>
<body>

<!-- Sidebar -->
<aside class="admin-sidebar" id="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-brand">
        <div class="sidebar-logo">
            <img src="{{ asset('images/logo.png') }}" alt="Sofinish">
        </div>
        <div class="sidebar-brand-name">Sofin<span>ish</span></div>
    </a>

    <div class="sidebar-nav">
        <span class="nav-label">Analytics & Visitors</span>
        <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard*') ? 'active' : '' }}">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M18 17V9"/><path d="M13 17V5"/><path d="M8 17v-3"/></svg>
            <span>Visitor Intelligence</span>
        </a>

        <span class="nav-label">Lead Generation</span>
        <a href="{{ route('admin.inquiries') }}" class="sidebar-link {{ request()->routeIs('admin.inquiries*') ? 'active' : '' }}">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            <span>Contact Inquiries</span>
            @php
                $unreadTotal = \App\Models\ContactInquiry::where('status', 'unread')->count();
            @endphp
            @if($unreadTotal > 0)
                <span class="sidebar-badge unread">{{ $unreadTotal }}</span>
            @endif
        </a>

        <span class="nav-label">System & Live Tools</span>
        <a href="{{ route('setup.db') }}" target="_blank" class="sidebar-link">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 7v10c0 2.21 3.58 4 8 4s8-1.79 8-4V7"/><path d="M4 7c0 2.21 3.58 4 8 4s8-1.79 8-4"/><path d="M4 7c0-2.21 3.58-4 8-4s8 1.79 8 4"/><path d="M4 12c0 2.21 3.58 4 8 4s8-1.79 8-4"/></svg>
            <span>Run DB Setup / Status</span>
        </a>
        <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
            <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"/><polyline points="15 3 21 3 21 9"/><line x1="10" y1="14" x2="21" y2="3"/></svg>
            <span>View Live Website</span>
        </a>
    </div>

    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">
                {{ strtoupper(substr(Auth::user()->name ?? 'A', 0, 1)) }}
            </div>
            <div class="user-meta">
                <h4>{{ Auth::user()->name ?? 'Admin User' }}</h4>
                <span>{{ Auth::user()->email ?? 'admin@sofinish.co.uk' }}</span>
            </div>
        </div>
        <form action="{{ route('admin.logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="btn-logout" title="Sign Out">
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
            </button>
        </form>
    </div>
</aside>

<!-- Main Wrapper -->
<div class="admin-main">
    <header class="admin-topbar">
        <div class="topbar-title">
            <h1>@yield('page_title', 'Analytics & Visitor Dashboard')</h1>
            <p>Real-time traffic tracking, IP analytics & customer journey</p>
        </div>
        <div class="topbar-actions">
            <div class="live-status-pill">
                <span class="pulse-dot"></span>
                <span>Live Tracker Active</span>
            </div>
            <a href="{{ route('home') }}" target="_blank" class="btn-topbar">
                <span>View Site ↗</span>
            </a>
        </div>
    </header>

    <div class="admin-content">
        @if(session('success'))
            <div class="toast-banner toast-success">
                <span>✓</span>
                <div>{{ session('success') }}</div>
            </div>
        @endif

        @yield('content')
    </div>
</div>

@yield('extra_js')
</body>
</html>

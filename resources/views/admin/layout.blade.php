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
    <!-- Chart.js for interactive graphs -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
    <style>
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }
        :root {
            --bg-page: #f8fafc;
            --card-bg: #ffffff;
            --card-border: #e2e8f0;
            --text-main: #0f172a;
            --text-muted: #64748b;
            --text-light: #94a3b8;
            --blue-800: #1e3a8a;
            --blue-600: #2563eb;
            --blue-500: #3b82f6;
            --blue-100: #dbeafe;
            --blue-50: #eff6ff;
            --teal-600: #0891b2;
            --teal-500: #06b6d4;
            --teal-50: #ecfeff;
            --emerald-600: #059669;
            --emerald-500: #10b981;
            --emerald-50: #ecfdf5;
            --red-500: #ef4444;
            --red-50: #fef2f2;
            --radius-sm: 8px;
            --radius-md: 14px;
            --radius-lg: 20px;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--bg-page);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
        }

        /* Sidebar - Clean Light / White Theme */
        .admin-sidebar {
            width: 270px;
            background: #ffffff;
            border-right: 1px solid var(--card-border);
            display: flex;
            flex-direction: column;
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 100;
            transition: all 0.3s ease;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.02);
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
            background: #eff6ff;
            border: 1px solid #dbeafe;
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
            color: var(--text-main);
        }
        .sidebar-brand-name span {
            color: var(--blue-600);
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
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--text-light);
            padding: 10px 12px 6px;
        }
        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            border-radius: var(--radius-sm);
            color: #475569;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s ease;
        }
        .sidebar-link svg {
            width: 19px;
            height: 19px;
            color: #64748b;
            transition: color 0.2s ease;
        }
        .sidebar-link:hover {
            color: var(--blue-600);
            background: var(--blue-50);
        }
        .sidebar-link:hover svg {
            color: var(--blue-600);
        }
        .sidebar-link.active {
            color: var(--blue-600);
            background: var(--blue-50);
            border: 1px solid #bfdbfe;
            font-weight: 600;
        }
        .sidebar-link.active svg {
            color: var(--blue-600);
        }
        .sidebar-badge {
            margin-left: auto;
            background: var(--blue-600);
            color: #ffffff;
            font-size: 11.5px;
            font-weight: 700;
            padding: 2px 8px;
            border-radius: 999px;
        }
        .sidebar-badge.unread {
            background: var(--red-500);
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
        }

        .sidebar-footer {
            padding: 18px 16px;
            border-top: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #f8fafc;
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
            background: linear-gradient(135deg, var(--blue-600), var(--teal-600));
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            font-weight: 700;
            color: #ffffff;
        }
        .user-meta h4 {
            font-size: 13px;
            font-weight: 600;
            color: var(--text-main);
        }
        .user-meta span {
            font-size: 11px;
            color: var(--text-muted);
        }
        .btn-logout {
            background: transparent;
            border: none;
            color: #94a3b8;
            cursor: pointer;
            padding: 6px;
            border-radius: 6px;
            transition: all 0.2s;
            display: flex;
            align-items: center;
        }
        .btn-logout:hover {
            color: var(--red-500);
            background: var(--red-50);
        }

        /* Main Content */
        .admin-main {
            margin-left: 270px;
            flex: 1;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            background: var(--bg-page);
        }
        .admin-topbar {
            height: 72px;
            padding: 0 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: #ffffff;
            border-bottom: 1px solid var(--card-border);
            position: sticky;
            top: 0;
            z-index: 50;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.03);
        }
        .topbar-title h1 {
            font-family: 'Space Grotesk', sans-serif;
            font-size: 20px;
            font-weight: 700;
            color: var(--text-main);
        }
        .topbar-title p {
            font-size: 12.5px;
            color: var(--text-muted);
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
            background: var(--emerald-50);
            border: 1px solid #a7f3d0;
            border-radius: 999px;
            font-size: 12px;
            font-weight: 600;
            color: var(--emerald-600);
        }
        .pulse-dot {
            width: 8px;
            height: 8px;
            background: var(--emerald-500);
            border-radius: 50%;
            animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0% { transform: scale(0.95); box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.6); }
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
            font-weight: 600;
            text-decoration: none;
            color: #334155;
            background: #ffffff;
            border: 1px solid var(--card-border);
            transition: all 0.2s;
        }
        .btn-topbar:hover {
            background: #f1f5f9;
            color: var(--blue-600);
            border-color: #cbd5e1;
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
            background: #ecfdf5;
            border: 1px solid #a7f3d0;
            color: #065f46;
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

@extends('admin.layout')

@section('title', 'Visitor Intelligence & Analytics Dashboard')
@section('page_title', 'Visitor Intelligence & Analytics')

@section('extra_css')
<style>
    /* KPI Stats Grid */
    .kpi-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
        margin-bottom: 30px;
    }
    .kpi-card {
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-md);
        padding: 22px 24px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .kpi-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.06);
    }
    .kpi-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, var(--blue-600), var(--teal-600));
    }
    .kpi-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 12px;
    }
    .kpi-label {
        font-size: 13px;
        font-weight: 600;
        color: var(--text-muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .kpi-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: var(--blue-50);
        color: var(--blue-600);
    }
    .kpi-value {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 30px;
        font-weight: 700;
        color: var(--text-main);
        line-height: 1.1;
    }
    .kpi-meta {
        font-size: 12px;
        color: var(--text-muted);
        margin-top: 6px;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .kpi-badge {
        color: var(--emerald-600);
        font-weight: 600;
    }

    /* Charts Grid */
    .charts-grid {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 24px;
        margin-bottom: 30px;
    }
    @media (max-width: 1024px) {
        .charts-grid {
            grid-template-columns: 1fr;
        }
    }
    .chart-card {
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-md);
        padding: 24px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    }
    .chart-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 20px;
    }
    .chart-header h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 16px;
        font-weight: 700;
        color: var(--text-main);
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .chart-tag {
        font-size: 11.5px;
        font-weight: 600;
        padding: 3px 9px;
        border-radius: 6px;
        background: var(--blue-50);
        color: var(--blue-600);
        border: 1px solid #bfdbfe;
    }
    .chart-container-large {
        position: relative;
        height: 280px;
        width: 100%;
    }
    .chart-container-donut {
        position: relative;
        height: 260px;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .charts-subgrid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        margin-bottom: 30px;
    }

    /* Table Section */
    .table-section {
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-md);
        padding: 24px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
    }
    .table-toolbar {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 16px;
        margin-bottom: 20px;
        flex-wrap: wrap;
    }
    .toolbar-title h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 17px;
        font-weight: 700;
        color: var(--text-main);
    }
    .toolbar-title p {
        font-size: 12.5px;
        color: var(--text-muted);
        margin-top: 2px;
    }
    .search-form {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .search-input {
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-sm);
        padding: 9px 14px;
        color: var(--text-main);
        font-size: 13.5px;
        width: 260px;
        outline: none;
        transition: all 0.2s;
    }
    .search-input:focus {
        border-color: var(--blue-600);
        box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.15);
    }
    .btn-search {
        background: var(--blue-600);
        color: #ffffff;
        border: none;
        border-radius: var(--radius-sm);
        padding: 9px 16px;
        font-size: 13.5px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
    }
    .btn-search:hover {
        background: var(--blue-800);
    }

    /* Modern Light Table */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
    }
    .custom-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        font-size: 13.5px;
    }
    .custom-table th {
        background: #f8fafc;
        color: var(--text-muted);
        text-transform: uppercase;
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: 0.5px;
        padding: 14px 16px;
        text-align: left;
        border-bottom: 1px solid var(--card-border);
    }
    .custom-table td {
        padding: 14px 16px;
        border-bottom: 1px solid #f1f5f9;
        color: #334155;
        vertical-align: middle;
    }
    .custom-table tr:hover td {
        background: #f8fafc;
    }

    /* IP & Badge Pills */
    .ip-badge {
        font-family: monospace;
        font-weight: 600;
        color: #0369a1;
        background: #f0f9ff;
        padding: 3px 8px;
        border-radius: 6px;
        border: 1px solid #bae6fd;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .location-cell {
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .visit-count-badge {
        background: var(--blue-50);
        color: var(--blue-600);
        border: 1px solid #bfdbfe;
        padding: 4px 10px;
        border-radius: 999px;
        font-weight: 700;
        font-size: 12px;
        display: inline-block;
    }
    .device-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12.5px;
        color: #475569;
    }
    .time-cell {
        font-size: 12px;
        color: var(--text-muted);
    }
    .time-cell strong {
        color: var(--text-main);
        display: block;
        font-size: 13px;
    }

    /* Journey Button */
    .btn-journey {
        background: linear-gradient(135deg, var(--blue-600) 0%, var(--teal-600) 100%);
        color: #ffffff;
        border: none;
        border-radius: var(--radius-sm);
        padding: 7px 14px;
        font-size: 12.5px;
        font-weight: 600;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.2);
    }
    .btn-journey:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
        filter: brightness(1.05);
    }

    /* Modal Backdrop & Container */
    .journey-modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(15, 23, 42, 0.6);
        backdrop-filter: blur(4px);
        z-index: 999;
        align-items: center;
        justify-content: center;
        padding: 20px;
    }
    .journey-modal.active {
        display: flex;
    }
    .modal-content {
        background: #ffffff;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-lg);
        width: 100%;
        max-width: 680px;
        max-height: 90vh;
        display: flex;
        flex-direction: column;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.15);
        overflow: hidden;
        animation: modalFadeIn 0.25s ease-out;
    }
    @keyframes modalFadeIn {
        from { opacity: 0; transform: scale(0.96); }
        to { opacity: 1; transform: scale(1); }
    }
    .modal-header {
        padding: 22px 28px;
        background: #f8fafc;
        border-bottom: 1px solid var(--card-border);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .modal-header h3 {
        font-family: 'Space Grotesk', sans-serif;
        font-size: 18px;
        color: var(--text-main);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .btn-close-modal {
        background: transparent;
        border: none;
        color: var(--text-muted);
        font-size: 22px;
        cursor: pointer;
        padding: 4px;
        line-height: 1;
        transition: color 0.2s;
    }
    .btn-close-modal:hover {
        color: var(--text-main);
    }
    .modal-body {
        padding: 24px 28px;
        overflow-y: auto;
        flex: 1;
    }
    .visitor-profile-card {
        background: #f8fafc;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-sm);
        padding: 16px 20px;
        margin-bottom: 24px;
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(130px, 1fr));
        gap: 12px;
    }
    .profile-item label {
        display: block;
        font-size: 11px;
        font-weight: 600;
        text-transform: uppercase;
        color: var(--text-muted);
        margin-bottom: 2px;
    }
    .profile-item span {
        font-size: 13.5px;
        font-weight: 700;
        color: var(--blue-600);
    }

    /* Chronological Timeline - Light Theme */
    .timeline {
        position: relative;
        padding-left: 28px;
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    .timeline::before {
        content: '';
        position: absolute;
        top: 8px;
        bottom: 8px;
        left: 9px;
        width: 2px;
        background: #cbd5e1;
    }
    .timeline-step {
        position: relative;
    }
    .timeline-marker {
        position: absolute;
        left: -28px;
        top: 2px;
        width: 20px;
        height: 20px;
        border-radius: 50%;
        background: #ffffff;
        border: 2px solid var(--blue-600);
        color: var(--blue-600);
        font-size: 10px;
        font-weight: 700;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .timeline-content {
        background: #f8fafc;
        border: 1px solid var(--card-border);
        border-radius: var(--radius-sm);
        padding: 14px 18px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .timeline-content:hover {
        border-color: #bfdbfe;
        box-shadow: 0 2px 8px rgba(37, 99, 235, 0.08);
    }
    .timeline-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 6px;
    }
    .page-path {
        font-family: monospace;
        font-size: 13.5px;
        font-weight: 700;
        color: var(--blue-600);
    }
    .step-time {
        font-size: 11.5px;
        color: var(--text-muted);
    }
    .step-title {
        font-size: 13px;
        color: #1e293b;
        margin-bottom: 4px;
        font-weight: 600;
    }
    .step-referrer {
        font-size: 11.5px;
        color: var(--text-muted);
        word-break: break-all;
    }
</style>
@endsection

@section('content')

<!-- KPI Cards -->
<div class="kpi-grid">
    <div class="kpi-card">
        <div class="kpi-header">
            <span class="kpi-label">Unique Visitors (IPs)</span>
            <div class="kpi-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </div>
        </div>
        <div class="kpi-value">{{ number_format($totalUniqueVisitors) }}</div>
        <div class="kpi-meta">
            <span class="kpi-badge">100% Unique</span> Distinct IP addresses tracked
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <span class="kpi-label">Total Visits Sessions</span>
            <div class="kpi-icon" style="background: var(--teal-50); color: var(--teal-600);">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 2v20M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
            </div>
        </div>
        <div class="kpi-value">{{ number_format($totalVisitsCount) }}</div>
        <div class="kpi-meta">
            <span>Cumulative return visits recorded</span>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <span class="kpi-label">Total Page Views</span>
            <div class="kpi-icon" style="background: #f0fdf4; color: #16a34a;">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>
            </div>
        </div>
        <div class="kpi-value">{{ number_format($totalPageViews) }}</div>
        <div class="kpi-meta">
            <span>All pages & routes browsed</span>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <span class="kpi-label">Today's Visitors</span>
            <div class="kpi-icon" style="background: #fefce8; color: #ca8a04;">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>
            </div>
        </div>
        <div class="kpi-value">{{ number_format($todayVisitors) }}</div>
        <div class="kpi-meta">
            <span class="kpi-badge">Active today</span>
        </div>
    </div>

    <div class="kpi-card">
        <div class="kpi-header">
            <span class="kpi-label">Inquiries Received</span>
            <div class="kpi-icon" style="background: #fef2f2; color: #dc2626;">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
            </div>
        </div>
        <div class="kpi-value">{{ number_format($totalInquiries) }}</div>
        <div class="kpi-meta">
            <span style="color: #dc2626; font-weight: 600;">{{ $unreadInquiries }} unread</span> &bull; <a href="{{ route('admin.inquiries') }}" style="color:var(--blue-600); font-weight:600;">View Inquiries →</a>
        </div>
    </div>
</div>

<!-- Graphs Section (3 Types of Interactive Graphs) -->
<div class="charts-grid">
    <!-- Chart 1: Line / Area Chart -->
    <div class="chart-card">
        <div class="chart-header">
            <h3>
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 3v18h18"/><path d="M19 9l-5 5-4-4-3 3"/></svg>
                Traffic Trend (Last 14 Days)
            </h3>
            <span class="chart-tag">Type 1: Area & Line Trend</span>
        </div>
        <div class="chart-container-large">
            <canvas id="trafficTrendChart"></canvas>
        </div>
    </div>

    <!-- Chart 2: Doughnut Chart -->
    <div class="chart-card">
        <div class="chart-header">
            <h3>
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 2a10 10 0 0 1 10 10h-10z"/></svg>
                Browsers Breakdown
            </h3>
            <span class="chart-tag">Type 2: Doughnut</span>
        </div>
        <div class="chart-container-donut">
            <canvas id="browserDoughnutChart"></canvas>
        </div>
    </div>
</div>

<!-- Graph 3: Horizontal Bar Chart -->
<div class="charts-subgrid">
    <div class="chart-card">
        <div class="chart-header">
            <h3>
                <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 20V10M12 20V4M6 20v-6"/></svg>
                Most Visited Pages & Routes
            </h3>
            <span class="chart-tag">Type 3: Frequency Bar Chart</span>
        </div>
        <div style="position: relative; height: 220px; width: 100%;">
            <canvas id="topPagesBarChart"></canvas>
        </div>
    </div>
</div>

<!-- Visitor Analytics Table -->
<div class="table-section">
    <div class="table-toolbar">
        <div class="toolbar-title">
            <h3>Visitor Records & Journey Intelligence</h3>
            <p>1 row per unique IP address &bull; Real-time journey logs & route mapping</p>
        </div>
        <form action="{{ route('admin.dashboard') }}" method="GET" class="search-form">
            <input type="text" name="search" class="search-input" placeholder="Search IP, Country, Browser..." value="{{ $search }}">
            <button type="submit" class="btn-search">Search</button>
            @if($search)
                <a href="{{ route('admin.dashboard') }}" style="color:var(--text-muted); font-size:13px; text-decoration:none;">Clear</a>
            @endif
        </form>
    </div>

    <div class="table-responsive">
        <table class="custom-table">
            <thead>
                <tr>
                    <th>Visitor IP</th>
                    <th>Location</th>
                    <th>Browser & System</th>
                    <th>Visits Count</th>
                    <th>First Seen</th>
                    <th>Last Active</th>
                    <th>User Journey</th>
                </tr>
            </thead>
            <tbody>
                @forelse($visitors as $visitor)
                    <tr>
                        <td>
                            <span class="ip-badge">
                                <span>🌐</span>
                                <span>{{ $visitor->ip_address }}</span>
                            </span>
                        </td>
                        <td>
                            <div class="location-cell">
                                <span style="font-size: 15px;">📍</span>
                                <div>
                                    <strong style="color: var(--text-main); display: block;">{{ $visitor->city ?? 'Unknown' }}</strong>
                                    <span style="color: var(--text-muted); font-size: 11.5px;">{{ $visitor->country ?? 'Global' }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="device-badge">
                                @if(stripos($visitor->device_type, 'Mobile') !== false)
                                    <span>📱</span>
                                @else
                                    <span>💻</span>
                                @endif
                                <strong style="color: var(--text-main);">{{ $visitor->browser ?? 'Browser' }}</strong>
                                <span style="color: var(--text-muted); font-size: 11.5px;">({{ $visitor->operating_system ?? 'OS' }})</span>
                            </div>
                        </td>
                        <td>
                            <span class="visit-count-badge">
                                {{ $visitor->visit_count }} {{ Str::plural('visit', $visitor->visit_count) }}
                            </span>
                        </td>
                        <td>
                            <div class="time-cell">
                                <strong>{{ $visitor->first_visit_at ? $visitor->first_visit_at->format('d M Y') : 'N/A' }}</strong>
                                <span>{{ $visitor->first_visit_at ? $visitor->first_visit_at->format('h:i A') : '' }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="time-cell">
                                <strong>{{ $visitor->last_visit_at ? $visitor->last_visit_at->diffForHumans() : 'N/A' }}</strong>
                                <span>{{ $visitor->last_visit_at ? $visitor->last_visit_at->format('d M, h:i A') : '' }}</span>
                            </div>
                        </td>
                        <td>
                            <button type="button" class="btn-journey" onclick="openJourneyModal({{ $visitor->id }})">
                                <svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M9 18l6-6-6-6"/></svg>
                                <span>View Journey ({{ $visitor->page_views_count }})</span>
                            </button>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: var(--text-muted);">
                            No visitor records found matching your filter.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top: 20px;">
        {{ $visitors->links() }}
    </div>
</div>

<!-- Modal for Visitor Journey -->
<div class="journey-modal" id="journeyModal" onclick="closeJourneyModalOnBackdrop(event)">
    <div class="modal-content">
        <div class="modal-header">
            <h3>
                <span>🧭</span>
                <span id="modalTitle">Visitor Journey Timeline</span>
            </h3>
            <button type="button" class="btn-close-modal" onclick="closeJourneyModal()">&times;</button>
        </div>

        <div class="modal-body">
            <!-- Profile summary -->
            <div class="visitor-profile-card" id="modalVisitorProfile">
                <div class="profile-item">
                    <label>IP Address</label>
                    <span id="profileIp">-</span>
                </div>
                <div class="profile-item">
                    <label>Location</label>
                    <span id="profileLocation">-</span>
                </div>
                <div class="profile-item">
                    <label>Total Visits</label>
                    <span id="profileVisits">-</span>
                </div>
                <div class="profile-item">
                    <label>Device / OS</label>
                    <span id="profileDevice">-</span>
                </div>
            </div>

            <!-- Steps timeline -->
            <div class="timeline" id="journeyTimeline">
                <div style="text-align: center; color: var(--text-muted); padding: 20px;">
                    Loading journey details...
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('extra_js')
<script>
    // 1. Chart 1: Daily Visitors & Pageviews Timeline (Area & Line)
    const ctxTrend = document.getElementById('trafficTrendChart').getContext('2d');
    const trendDates = {!! json_encode($chartDates) !!};
    const trendVisitors = {!! json_encode($chartVisitors) !!};
    const trendViews = {!! json_encode($chartViews) !!};

    const gradientVisitors = ctxTrend.createLinearGradient(0, 0, 0, 260);
    gradientVisitors.addColorStop(0, 'rgba(37, 99, 235, 0.2)');
    gradientVisitors.addColorStop(1, 'rgba(37, 99, 235, 0.0)');

    const gradientViews = ctxTrend.createLinearGradient(0, 0, 0, 260);
    gradientViews.addColorStop(0, 'rgba(6, 182, 212, 0.18)');
    gradientViews.addColorStop(1, 'rgba(6, 182, 212, 0.0)');

    new Chart(ctxTrend, {
        type: 'line',
        data: {
            labels: trendDates,
            datasets: [
                {
                    label: 'Unique Visitors',
                    data: trendVisitors,
                    borderColor: '#2563eb',
                    backgroundColor: gradientVisitors,
                    borderWidth: 2.5,
                    fill: true,
                    tension: 0.35,
                    pointBackgroundColor: '#2563eb',
                    pointRadius: 3,
                    pointHoverRadius: 6
                },
                {
                    label: 'Page Views',
                    data: trendViews,
                    borderColor: '#0891b2',
                    backgroundColor: gradientViews,
                    borderWidth: 2,
                    borderDash: [4, 4],
                    fill: true,
                    tension: 0.35,
                    pointBackgroundColor: '#0891b2',
                    pointRadius: 3,
                    pointHoverRadius: 6
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    labels: { color: '#334155', font: { family: 'Inter', size: 12, weight: '600' } }
                },
                tooltip: {
                    backgroundColor: '#0f172a',
                    titleColor: '#ffffff',
                    bodyColor: '#e2e8f0',
                    borderColor: '#e2e8f0',
                    borderWidth: 1,
                    padding: 10
                }
            },
            scales: {
                x: {
                    grid: { color: 'rgba(0, 0, 0, 0.04)' },
                    ticks: { color: '#64748b', font: { family: 'Inter', size: 11 } }
                },
                y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0, 0, 0, 0.04)' },
                    ticks: { precision: 0, color: '#64748b', font: { family: 'Inter', size: 11 } }
                }
            }
        }
    });

    // 2. Chart 2: Browser Doughnut Chart
    const ctxBrowser = document.getElementById('browserDoughnutChart').getContext('2d');
    const browserLabels = {!! json_encode($browserLabels) !!};
    const browserCounts = {!! json_encode($browserCounts) !!};

    new Chart(ctxBrowser, {
        type: 'doughnut',
        data: {
            labels: browserLabels.length > 0 ? browserLabels : ['No data'],
            datasets: [{
                data: browserCounts.length > 0 ? browserCounts : [1],
                backgroundColor: [
                    '#2563eb',
                    '#0891b2',
                    '#3b82f6',
                    '#10b981',
                    '#f59e0b',
                    '#8b5cf6'
                ],
                borderWidth: 2,
                borderColor: '#ffffff',
                hoverOffset: 6
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '68%',
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { color: '#334155', font: { family: 'Inter', size: 11.5, weight: '500' }, boxWidth: 12 }
                }
            }
        }
    });

    // 3. Chart 3: Top Pages Horizontal Bar Chart
    const ctxPages = document.getElementById('topPagesBarChart').getContext('2d');
    const pageLabels = {!! json_encode($pageLabels) !!};
    const pageCounts = {!! json_encode($pageCounts) !!};

    new Chart(ctxPages, {
        type: 'bar',
        data: {
            labels: pageLabels,
            datasets: [{
                label: 'Page Views',
                data: pageCounts,
                backgroundColor: 'rgba(37, 99, 235, 0.85)',
                borderColor: '#2563eb',
                borderWidth: 1,
                borderRadius: 6
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false },
                tooltip: {
                    backgroundColor: '#0f172a',
                    titleColor: '#ffffff',
                    bodyColor: '#e2e8f0',
                    padding: 8
                }
            },
            scales: {
                x: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0, 0, 0, 0.04)' },
                    ticks: { precision: 0, color: '#64748b' }
                },
                y: {
                    grid: { display: false },
                    ticks: { color: '#334155', font: { family: 'monospace', size: 12 } }
                }
            }
        }
    });

    // Journey Modal Logic
    const modal = document.getElementById('journeyModal');

    function openJourneyModal(visitorId) {
        modal.classList.add('active');
        const timeline = document.getElementById('journeyTimeline');
        timeline.innerHTML = '<div style="text-align: center; color: var(--text-muted); padding: 30px;">Loading route journey...</div>';

        fetch(`/admin/visitor/${visitorId}/journey`)
            .then(res => res.json())
            .then(data => {
                if (data.status === 'success') {
                    const v = data.visitor;
                    document.getElementById('modalTitle').textContent = `Journey for IP: ${v.ip_address}`;
                    document.getElementById('profileIp').textContent = v.ip_address;
                    document.getElementById('profileLocation').textContent = `${v.city}, ${v.country}`;
                    document.getElementById('profileVisits').textContent = `${v.visit_count} visits recorded`;
                    document.getElementById('profileDevice').textContent = `${v.browser} on ${v.operating_system}`;

                    if (data.journey.length === 0) {
                        timeline.innerHTML = '<div style="text-align: center; color: var(--text-muted); padding: 20px;">No individual page hits recorded for this visitor yet.</div>';
                        return;
                    }

                    let html = '';
                    data.journey.forEach(step => {
                        html += `
                            <div class="timeline-step">
                                <div class="timeline-marker">${step.step}</div>
                                <div class="timeline-content">
                                    <div class="timeline-top">
                                        <span class="page-path">${step.path}</span>
                                        <span class="step-time">${step.time_ago} &bull; ${step.time}</span>
                                    </div>
                                    <div class="step-title">${step.title}</div>
                                    <div class="step-referrer">
                                        <span style="color:var(--text-muted);">Referrer:</span> ${step.referrer}
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    timeline.innerHTML = html;
                } else {
                    timeline.innerHTML = '<div style="color: #ef4444; text-align: center;">Failed to load journey details.</div>';
                }
            })
            .catch(err => {
                timeline.innerHTML = '<div style="color: #ef4444; text-align: center;">Error fetching visitor journey.</div>';
            });
    }

    function closeJourneyModal() {
        modal.classList.remove('active');
    }

    function closeJourneyModalOnBackdrop(e) {
        if (e.target === modal) {
            closeJourneyModal();
        }
    }
</script>
@endsection

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Visitor;
use App\Models\PageView;
use App\Models\ContactInquiry;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the Admin Analytics & Visitor Dashboard
     */
    public function index(Request $request)
    {
        // 1. KPI Stats
        $totalUniqueVisitors = Visitor::count();
        $totalVisitsCount = (int) Visitor::sum('visit_count');
        $totalPageViews = PageView::count();
        $todayVisitors = Visitor::whereDate('last_visit_at', Carbon::today())->count();
        $totalInquiries = ContactInquiry::count();
        $unreadInquiries = ContactInquiry::where('status', 'unread')->count();

        // 2. Filter & Visitors Table Query
        $search = $request->input('search');
        $visitorsQuery = Visitor::withCount('pageViews')->orderBy('last_visit_at', 'desc');

        if ($search) {
            $visitorsQuery->where(function ($q) use ($search) {
                $q->where('ip_address', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('city', 'like', "%{$search}%")
                  ->orWhere('browser', 'like', "%{$search}%")
                  ->orWhere('operating_system', 'like', "%{$search}%");
            });
        }

        $visitors = $visitorsQuery->paginate(15)->withQueryString();

        // 3. Chart 1: Last 14 Days Visits & Page Views Timeline
        $days = 14;
        $chartDates = [];
        $chartVisitors = [];
        $chartViews = [];

        for ($i = $days - 1; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $formattedDate = $date->format('d M');
            $chartDates[] = $formattedDate;

            // Unique visitors on this date
            $vCount = Visitor::whereDate('last_visit_at', $date)->count();
            $chartVisitors[] = $vCount;

            // Page views on this date
            $pCount = PageView::whereDate('created_at', $date)->count();
            $chartViews[] = $pCount;
        }

        // 4. Chart 2: Top Browsers Breakdown
        $browserStats = Visitor::select('browser', DB::raw('count(*) as count'))
            ->groupBy('browser')
            ->orderBy('count', 'desc')
            ->limit(5)
            ->get();

        $browserLabels = $browserStats->pluck('browser')->toArray();
        $browserCounts = $browserStats->pluck('count')->toArray();

        // 5. Chart 3: Top Pages / Routes Visited
        $topPages = PageView::select('path', DB::raw('count(*) as count'))
            ->groupBy('path')
            ->orderBy('count', 'desc')
            ->limit(7)
            ->get();

        $pageLabels = $topPages->map(function ($item) {
            $p = $item->path;
            return ($p === '/' || $p === '') ? 'Home (/)' : '/' . ltrim($p, '/');
        })->toArray();
        $pageCounts = $topPages->pluck('count')->toArray();

        // 6. Device Distribution
        $deviceStats = Visitor::select('device_type', DB::raw('count(*) as count'))
            ->groupBy('device_type')
            ->get();

        return view('admin.dashboard', compact(
            'totalUniqueVisitors',
            'totalVisitsCount',
            'totalPageViews',
            'todayVisitors',
            'totalInquiries',
            'unreadInquiries',
            'visitors',
            'search',
            'chartDates',
            'chartVisitors',
            'chartViews',
            'browserLabels',
            'browserCounts',
            'pageLabels',
            'pageCounts',
            'deviceStats'
        ));
    }

    /**
     * AJAX/Modal endpoint to view visitor journey
     */
    public function visitorJourney($id)
    {
        $visitor = Visitor::with(['pageViews' => function ($q) {
            $q->orderBy('created_at', 'asc');
        }])->findOrFail($id);

        return response()->json([
            'status' => 'success',
            'visitor' => [
                'id' => $visitor->id,
                'ip_address' => $visitor->ip_address,
                'country' => $visitor->country,
                'city' => $visitor->city,
                'browser' => $visitor->browser,
                'operating_system' => $visitor->operating_system,
                'device_type' => $visitor->device_type,
                'visit_count' => $visitor->visit_count,
                'first_visit_at' => $visitor->first_visit_at ? $visitor->first_visit_at->format('d M Y, h:i A') : 'N/A',
                'last_visit_at' => $visitor->last_visit_at ? $visitor->last_visit_at->format('d M Y, h:i A') : 'N/A',
                'user_agent' => $visitor->user_agent,
            ],
            'journey' => $visitor->pageViews->map(function ($pv, $index) {
                return [
                    'step' => $index + 1,
                    'path' => ($pv->path === '/' || $pv->path === '') ? '/' : '/' . ltrim($pv->path, '/'),
                    'url' => $pv->url,
                    'title' => $pv->page_title ?: 'Page View',
                    'method' => $pv->method,
                    'referrer' => $pv->referrer ?: 'Direct / Bookmarked',
                    'time' => $pv->created_at ? $pv->created_at->format('d M Y, h:i:s A') : 'N/A',
                    'time_ago' => $pv->created_at ? $pv->created_at->diffForHumans() : '',
                ];
            }),
        ]);
    }
}

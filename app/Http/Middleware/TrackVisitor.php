<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\VisitorTracker;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Track after response is prepared (or only for GET html requests)
        if ($request->isMethod('GET') && !$request->expectsJson() && !$request->is('admin*') && !$request->is('setup-db*')) {
            VisitorTracker::track($request);
        }

        return $response;
    }
}

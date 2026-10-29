<?php

namespace App\Services;

use App\Models\Visitor;
use App\Models\PageView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class VisitorTracker
{
    /**
     * Track incoming request
     */
    public static function track(Request $request, ?string $pageTitle = null): void
    {
        try {
            $ip = self::getClientIp($request);
            $userAgent = $request->userAgent() ?? 'Unknown';

            // Skip tracking if crawler/bot or asset
            if (self::isBot($userAgent)) {
                return;
            }

            // Parse device & browser details
            $browserInfo = self::parseBrowser($userAgent);
            $osInfo = self::parseOperatingSystem($userAgent);
            $deviceType = self::parseDeviceType($userAgent);

            // Get or look up geo location
            $location = self::resolveLocation($ip);

            // Check if visitor exists
            $visitor = Visitor::where('ip_address', $ip)->first();

            $isNewSession = !session()->has('sofinish_visitor_session');

            if (!$visitor) {
                $visitor = Visitor::create([
                    'ip_address' => $ip,
                    'country' => $location['country'] ?? 'United Kingdom',
                    'country_code' => $location['country_code'] ?? 'GB',
                    'city' => $location['city'] ?? 'London',
                    'region' => $location['region'] ?? 'England',
                    'browser' => $browserInfo['name'],
                    'browser_version' => $browserInfo['version'],
                    'operating_system' => $osInfo,
                    'device_type' => $deviceType,
                    'visit_count' => 1,
                    'first_visit_at' => now(),
                    'last_visit_at' => now(),
                    'user_agent' => substr($userAgent, 0, 500),
                ]);
                session()->put('sofinish_visitor_session', true);
            } else {
                $updateData = [
                    'last_visit_at' => now(),
                    'browser' => $browserInfo['name'],
                    'operating_system' => $osInfo,
                    'device_type' => $deviceType,
                ];

                if ($isNewSession) {
                    $updateData['visit_count'] = $visitor->visit_count + 1;
                    session()->put('sofinish_visitor_session', true);
                }

                // If location was unknown previously, update it
                if (empty($visitor->country) || $visitor->country === 'Unknown') {
                    $updateData['country'] = $location['country'];
                    $updateData['country_code'] = $location['country_code'];
                    $updateData['city'] = $location['city'];
                    $updateData['region'] = $location['region'];
                }

                $visitor->update($updateData);
            }

            // Record Page View
            PageView::create([
                'visitor_id' => $visitor->id,
                'ip_address' => $ip,
                'url' => substr($request->fullUrl(), 0, 990),
                'path' => substr($request->path(), 0, 250),
                'page_title' => $pageTitle ?? self::inferTitle($request->path()),
                'method' => $request->method(),
                'referrer' => substr($request->headers->get('referer', ''), 0, 990) ?: null,
                'created_at' => now(),
            ]);
        } catch (\Throwable $e) {
            Log::warning('VisitorTracker error: ' . $e->getMessage());
        }
    }

    /**
     * Get real client IP address
     */
    public static function getClientIp(Request $request): string
    {
        $headers = [
            'HTTP_CF_CONNECTING_IP',
            'HTTP_X_REAL_IP',
            'HTTP_X_FORWARDED_FOR',
            'HTTP_CLIENT_IP',
        ];

        foreach ($headers as $header) {
            $ip = $request->server($header);
            if (!empty($ip)) {
                $parts = explode(',', $ip);
                $firstIp = trim($parts[0]);
                if (filter_var($firstIp, FILTER_VALIDATE_IP)) {
                    return $firstIp;
                }
            }
        }

        return $request->ip() ?: '127.0.0.1';
    }

    /**
     * Resolve IP Geolocation with caching & local fallback
     */
    public static function resolveLocation(string $ip): array
    {
        // For local or private IP addresses
        if (in_array($ip, ['127.0.0.1', '::1']) || !filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            return [
                'country' => 'United Kingdom',
                'country_code' => 'GB',
                'city' => 'London',
                'region' => 'Greater London',
            ];
        }

        return Cache::remember('geo_ip_' . $ip, 86400 * 7, function () use ($ip) {
            try {
                $response = Http::timeout(2)->get("http://ip-api.com/json/{$ip}?fields=status,country,countryCode,regionName,city");
                if ($response->successful()) {
                    $data = $response->json();
                    if (($data['status'] ?? '') === 'success') {
                        return [
                            'country' => $data['country'] ?? 'Unknown',
                            'country_code' => $data['countryCode'] ?? '',
                            'city' => $data['city'] ?? 'Unknown',
                            'region' => $data['regionName'] ?? '',
                        ];
                    }
                }
            } catch (\Throwable $e) {
                // fall through
            }

            return [
                'country' => 'Global Visitor',
                'country_code' => 'GB',
                'city' => 'Online',
                'region' => '',
            ];
        });
    }

    /**
     * Detect browser
     */
    public static function parseBrowser(string $userAgent): array
    {
        $browser = 'Other Browser';
        $version = '';

        if (preg_match('/Edg\/([0-9\.]+)/i', $userAgent, $matches)) {
            $browser = 'Microsoft Edge';
            $version = $matches[1] ?? '';
        } elseif (preg_match('/OPR\/([0-9\.]+)/i', $userAgent, $matches) || preg_match('/Opera\/([0-9\.]+)/i', $userAgent, $matches)) {
            $browser = 'Opera';
            $version = $matches[1] ?? '';
        } elseif (preg_match('/Chrome\/([0-9\.]+)/i', $userAgent, $matches)) {
            $browser = 'Google Chrome';
            $version = $matches[1] ?? '';
        } elseif (preg_match('/Firefox\/([0-9\.]+)/i', $userAgent, $matches)) {
            $browser = 'Mozilla Firefox';
            $version = $matches[1] ?? '';
        } elseif (preg_match('/Safari\/([0-9\.]+)/i', $userAgent, $matches) && !preg_match('/Chrome/i', $userAgent)) {
            $browser = 'Apple Safari';
            $version = $matches[1] ?? '';
        } elseif (preg_match('/MSIE|Trident/i', $userAgent)) {
            $browser = 'Internet Explorer';
        }

        return ['name' => $browser, 'version' => $version];
    }

    /**
     * Detect Operating System
     */
    public static function parseOperatingSystem(string $userAgent): string
    {
        if (preg_match('/Windows NT 10.0/i', $userAgent)) return 'Windows 10/11';
        if (preg_match('/Windows NT 6.3/i', $userAgent)) return 'Windows 8.1';
        if (preg_match('/Windows NT 6.2/i', $userAgent)) return 'Windows 8';
        if (preg_match('/Windows NT 6.1/i', $userAgent)) return 'Windows 7';
        if (preg_match('/Windows/i', $userAgent)) return 'Windows';
        if (preg_match('/iPhone|iPad|iPod/i', $userAgent)) return 'iOS';
        if (preg_match('/Macintosh|Mac OS X/i', $userAgent)) return 'macOS';
        if (preg_match('/Android/i', $userAgent)) return 'Android';
        if (preg_match('/Linux/i', $userAgent)) return 'Linux';

        return 'Other OS';
    }

    /**
     * Detect Device Type
     */
    public static function parseDeviceType(string $userAgent): string
    {
        if (preg_match('/iPad|Tablet|PlayBook/i', $userAgent)) return 'Tablet';
        if (preg_match('/Mobile|Android|iPhone|iPod|BlackBerry|IEMobile|Opera Mini/i', $userAgent)) return 'Mobile';
        return 'Desktop';
    }

    /**
     * Check if crawler / bot
     */
    public static function isBot(string $userAgent): bool
    {
        return (bool) preg_match('/bot|crawl|spider|slurp|facebookexternalhit|curl|wget|python|postman/i', $userAgent);
    }

    /**
     * Infer page title from path
     */
    public static function inferTitle(string $path): string
    {
        $clean = trim($path, '/');
        if (empty($clean) || $clean === '/') return 'Home Page';
        if ($clean === 'contact') return 'Contact Us';
        if ($clean === 'services') return 'Services';
        if ($clean === 'pricing') return 'Pricing';
        return ucwords(str_replace(['-', '_'], ' ', $clean));
    }
}

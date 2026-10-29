<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Visitor;
use App\Models\PageView;
use App\Models\ContactInquiry;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create or update Default Admin
        User::updateOrCreate(
            ['email' => 'admin@sofinish.co.uk'],
            [
                'name' => 'Sofinish Admin',
                'password' => Hash::make('admin123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Add realistic demo analytics data if table is empty
        if (Visitor::count() === 0) {
            $sampleVisitors = [
                [
                    'ip' => '86.14.120.45',
                    'country' => 'United Kingdom',
                    'country_code' => 'GB',
                    'city' => 'London',
                    'region' => 'Greater London',
                    'browser' => 'Google Chrome',
                    'version' => '122.0',
                    'os' => 'Windows 11',
                    'device' => 'Desktop',
                    'count' => 6,
                    'days_ago' => 0,
                    'pages' => [
                        ['path' => '/', 'title' => 'Home Page - Sofinish Technologies', 'min_ago' => 45],
                        ['path' => 'services', 'title' => 'Services - Enterprise Software', 'min_ago' => 40],
                        ['path' => 'contact', 'title' => 'Contact Us - Discovery Call', 'min_ago' => 32],
                    ],
                ],
                [
                    'ip' => '81.130.18.92',
                    'country' => 'United Kingdom',
                    'country_code' => 'GB',
                    'city' => 'Manchester',
                    'region' => 'North West',
                    'browser' => 'Apple Safari',
                    'version' => '17.2',
                    'os' => 'macOS',
                    'device' => 'Desktop',
                    'count' => 3,
                    'days_ago' => 1,
                    'pages' => [
                        ['path' => '/', 'title' => 'Home Page - Sofinish Technologies', 'min_ago' => 1400],
                        ['path' => 'pricing', 'title' => 'Transparent Pricing', 'min_ago' => 1390],
                    ],
                ],
                [
                    'ip' => '146.198.88.12',
                    'country' => 'United Kingdom',
                    'country_code' => 'GB',
                    'city' => 'Birmingham',
                    'region' => 'West Midlands',
                    'browser' => 'Google Chrome',
                    'version' => '121.0',
                    'os' => 'Android',
                    'device' => 'Mobile',
                    'count' => 8,
                    'days_ago' => 1,
                    'pages' => [
                        ['path' => '/', 'title' => 'Home Page', 'min_ago' => 1200],
                        ['path' => 'services', 'title' => 'SME Solutions', 'min_ago' => 1195],
                        ['path' => 'contact', 'title' => 'Contact Us', 'min_ago' => 1180],
                    ],
                ],
                [
                    'ip' => '104.28.19.4',
                    'country' => 'United States',
                    'country_code' => 'US',
                    'city' => 'New York',
                    'region' => 'New York',
                    'browser' => 'Microsoft Edge',
                    'version' => '120.0',
                    'os' => 'Windows 10',
                    'device' => 'Desktop',
                    'count' => 4,
                    'days_ago' => 2,
                    'pages' => [
                        ['path' => '/', 'title' => 'Home Page', 'min_ago' => 2800],
                        ['path' => 'case-studies', 'title' => 'Case Studies', 'min_ago' => 2780],
                    ],
                ],
                [
                    'ip' => '194.156.98.22',
                    'country' => 'Germany',
                    'country_code' => 'DE',
                    'city' => 'Frankfurt',
                    'region' => 'Hesse',
                    'browser' => 'Mozilla Firefox',
                    'version' => '123.0',
                    'os' => 'Linux',
                    'device' => 'Desktop',
                    'count' => 2,
                    'days_ago' => 3,
                    'pages' => [
                        ['path' => '/', 'title' => 'Home Page', 'min_ago' => 4200],
                    ],
                ],
                [
                    'ip' => '49.36.172.88',
                    'country' => 'India',
                    'country_code' => 'IN',
                    'city' => 'Mumbai',
                    'region' => 'Maharashtra',
                    'browser' => 'Apple Safari',
                    'version' => '17.1',
                    'os' => 'iOS',
                    'device' => 'Mobile',
                    'count' => 5,
                    'days_ago' => 0,
                    'pages' => [
                        ['path' => '/', 'title' => 'Home Page', 'min_ago' => 120],
                        ['path' => 'contact', 'title' => 'Contact Us', 'min_ago' => 100],
                    ],
                ],
            ];

            foreach ($sampleVisitors as $v) {
                $firstVisit = Carbon::now()->subDays($v['days_ago'] + 2)->subHours(3);
                $lastVisit = Carbon::now()->subDays($v['days_ago'])->subMinutes(rand(10, 50));

                $visitor = Visitor::create([
                    'ip_address' => $v['ip'],
                    'country' => $v['country'],
                    'country_code' => $v['country_code'],
                    'city' => $v['city'],
                    'region' => $v['region'],
                    'browser' => $v['browser'],
                    'browser_version' => $v['version'],
                    'operating_system' => $v['os'],
                    'device_type' => $v['device'],
                    'visit_count' => $v['count'],
                    'first_visit_at' => $firstVisit,
                    'last_visit_at' => $lastVisit,
                    'user_agent' => "Mozilla/5.0 ({$v['os']}) AppleWebKit/537.36 {$v['browser']}/{$v['version']}",
                ]);

                foreach ($v['pages'] as $page) {
                    PageView::create([
                        'visitor_id' => $visitor->id,
                        'ip_address' => $v['ip'],
                        'url' => url($page['path']),
                        'path' => $page['path'],
                        'page_title' => $page['title'],
                        'method' => 'GET',
                        'referrer' => 'https://www.google.com/search?q=enterprise+software+smes',
                        'created_at' => Carbon::now()->subMinutes($page['min_ago']),
                    ]);
                }
            }
        }

        // 3. Add initial sample contact inquiry if empty
        if (ContactInquiry::count() === 0) {
            ContactInquiry::create([
                'name' => 'James Harrison',
                'email' => 'james.harrison@apexretail.co.uk',
                'phone' => '+44 7700 900142',
                'company' => 'Apex Retail Logistics',
                'service' => 'ERP Systems',
                'budget' => '£25,000 - £50,000',
                'message' => 'We are looking to replace our legacy inventory management system with an integrated ERP that handles multi-warehouse fulfillment and connects with Shopify and Xero.',
                'ip_address' => '86.14.120.45',
                'status' => 'unread',
                'created_at' => Carbon::now()->subHours(2),
            ]);

            ContactInquiry::create([
                'name' => 'Sarah Jenkins',
                'email' => 's.jenkins@healthflow.io',
                'phone' => '+44 7700 900891',
                'company' => 'HealthFlow Solutions',
                'service' => 'Custom Websites & Web Portal',
                'budget' => '£10,000 - £25,000',
                'message' => 'Need a high-conversion patient onboarding portal with secure document verification and automated appointments booking.',
                'ip_address' => '81.130.18.92',
                'status' => 'read',
                'created_at' => Carbon::now()->subDays(1),
            ]);
        }
    }
}

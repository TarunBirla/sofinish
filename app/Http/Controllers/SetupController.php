<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Schema;
use Exception;
use PDO;

class SetupController extends Controller
{
    /**
     * One-click Live Server Database Setup & Migration Route
     */
    public function setup()
    {
        $steps = [];
        $error = null;
        $connectionType = config('database.default');

        try {
            // 1. Prepare Database Connection & Auto-Create Database if MySQL
            if ($connectionType === 'mysql') {
                $host = config('database.connections.mysql.host', '127.0.0.1');
                $port = config('database.connections.mysql.port', '3306');
                $dbName = config('database.connections.mysql.database', 'sofinish');
                $username = config('database.connections.mysql.username', 'root');
                $password = config('database.connections.mysql.password', '');

                try {
                    $pdo = new PDO("mysql:host={$host};port={$port}", $username, $password);
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
                    $steps[] = [
                        'title' => 'MySQL Database Verified / Created',
                        'desc' => "Database `{$dbName}` is ready on host `{$host}`.",
                        'status' => 'success'
                    ];
                } catch (Exception $e) {
                    $steps[] = [
                        'title' => 'MySQL Connection Check',
                        'desc' => "Note: " . $e->getMessage() . " (Will attempt migration if DB already created)",
                        'status' => 'info'
                    ];
                }
            } elseif ($connectionType === 'sqlite') {
                $sqlitePath = database_path('database.sqlite');
                if (!file_exists($sqlitePath)) {
                    touch($sqlitePath);
                }
                $steps[] = [
                    'title' => 'SQLite Database File Initialized',
                    'desc' => "Database file ready at: {$sqlitePath}",
                    'status' => 'success'
                ];
            }

            // 2. Run Database Migrations
            Artisan::call('migrate', ['--force' => true]);
            $migrateOutput = Artisan::output();
            $steps[] = [
                'title' => 'Database Migrations Executed',
                'desc' => 'All tables (`users`, `visitors`, `page_views`, `contact_inquiries`, etc.) migrated successfully.',
                'output' => $migrateOutput,
                'status' => 'success'
            ];

            // 3. Seed Default Admin & Sample Analytics
            Artisan::call('db:seed', ['--force' => true]);
            $seedOutput = Artisan::output();
            $steps[] = [
                'title' => 'Default Admin & Analytics Initialized',
                'desc' => 'Admin credentials created: admin@sofinish.co.uk / admin123',
                'status' => 'success'
            ];

            // 4. Try storage link
            try {
                Artisan::call('storage:link');
            } catch (Exception $e) {
                // ignore if already exists
            }

            $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' ORDER BY name;");
            $tableList = array_map(function($t) { return $t->name ?? ''; }, $tables);

        } catch (Exception $e) {
            $error = $e->getMessage();
            $steps[] = [
                'title' => 'Database Setup Encountered an Issue',
                'desc' => $e->getMessage(),
                'status' => 'error'
            ];
        }

        return view('setup', compact('steps', 'error', 'connectionType'));
    }
}

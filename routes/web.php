<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SetupController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Frontend Public Routes (Tracked via TrackVisitor middleware in web group)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// One-Click Live Server Database Setup & Migration Route
Route::get('/setup-db', [SetupController::class, 'setup'])->name('setup.db');
Route::get('/setup-database', [SetupController::class, 'setup'])->name('setup.database');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::any('/logout', [AuthController::class, 'logout'])->name('logout');

    // Protected Admin Routes
    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/visitor/{id}/journey', [DashboardController::class, 'visitorJourney'])->name('visitor.journey');

        Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries');
        Route::post('/inquiries/{id}/status', [InquiryController::class, 'updateStatus'])->name('inquiries.status');
        Route::delete('/inquiries/{id}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

        // Admin Profile & Security
        Route::get('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'edit'])->name('profile');
        Route::post('/profile', [\App\Http\Controllers\Admin\ProfileController::class, 'updateProfile'])->name('profile.update');
        Route::post('/profile/password', [\App\Http\Controllers\Admin\ProfileController::class, 'updatePassword'])->name('profile.password');
    });
});

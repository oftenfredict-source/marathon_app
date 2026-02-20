<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RegistrationManagementController;
use App\Http\Controllers\Admin\RunnerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);

// Registration Module
Route::get('/categories', [RegistrationController::class, 'getCategories']);
Route::get('/exchange-rate', [RegistrationController::class, 'getExchangeRate']);
Route::post('/register', [RegistrationController::class, 'register']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/dashboard', [DashboardController::class, 'index']);

    // Admin Registration Management
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard/statistics', [AdminDashboardController::class, 'getStatistics']);
        Route::get('/dashboard/charts', [AdminDashboardController::class, 'getChartData']);
        Route::get('/dashboard/recent', [AdminDashboardController::class, 'getRecentRegistrations']);

        Route::get('/registrations/pending', [RegistrationManagementController::class, 'getPendingRegistrations']);
        Route::get('/registrations/paid', [RegistrationManagementController::class, 'getPaidRegistrations']);
        Route::get('/registrations/statistics', [RegistrationManagementController::class, 'getStatistics']);
        Route::post('/verify-payment', [RegistrationController::class, 'verifyPayment']);

        Route::get('/runners', [RunnerController::class, 'index']);
        Route::get('/runners/{id}', [RunnerController::class, 'show']);
        Route::put('/runners/{id}', [RunnerController::class, 'update']);
        Route::post('/runners/{id}/checkin', [RunnerController::class, 'checkIn']);
        Route::get('/runners/export', [RunnerController::class, 'export']);

        Route::get('/categories', [CategoryController::class, 'index']);
        Route::post('/categories', [CategoryController::class, 'store']);
        Route::put('/categories/{id}', [CategoryController::class, 'update']);
        Route::delete('/categories/{id}', [CategoryController::class, 'destroy']);

        Route::get('/reports/registrations', [ReportController::class, 'registrationSummary']);
        Route::get('/reports/revenue', [ReportController::class, 'revenueReport']);
        Route::get('/reports/demographics', [ReportController::class, 'demographicsReport']);

        Route::get('/settings', [SettingsController::class, 'getSettings']);
        Route::post('/settings/marathon', [SettingsController::class, 'updateMarathon']);
        Route::post('/settings/profile', [SettingsController::class, 'updateProfile']);

        Route::get('/sms-logs', [\App\Http\Controllers\Admin\SmsLogController::class, 'index']);
        Route::get('/sms-logs/stats', [\App\Http\Controllers\Admin\SmsLogController::class, 'getStats']);
        Route::post('/sms-logs/{id}/resend', [\App\Http\Controllers\Admin\SmsLogController::class, 'resend']);
    });
});
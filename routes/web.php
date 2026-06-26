<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcquisitionController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CrmController;

Route::get('/', function () {
    return view('welcome');
});

// Acquisition Inquiry Routes
Route::middleware('throttle:5,1')->group(function () {
    Route::post('/acquisition', [AcquisitionController::class, 'store'])->name('acquisition.store');
});
Route::get('/acquisition', [AcquisitionController::class, 'show'])->name('acquisition.show');

// Admin Auth Routes
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// Secure Admin CRM Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin', [CrmController::class, 'index'])->name('admin.dashboard');
    Route::post('/admin/prospects/{prospect}/status', [CrmController::class, 'updateStatus'])->name('admin.prospect.status');
    Route::post('/admin/prospects/{prospect}/follow-up', [CrmController::class, 'logFollowUp'])->name('admin.prospect.followup');
    Route::post('/admin/prospects/{prospect}/send', [CrmController::class, 'sendEmail'])->name('admin.prospect.send');
});
Route::get('/acquisition/success', [AcquisitionController::class, 'success'])->name('acquisition.success');

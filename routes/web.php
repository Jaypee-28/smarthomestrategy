<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AcquisitionController;

Route::get('/', function () {
    return view('welcome');
});

// Acquisition Inquiry Routes
Route::middleware('throttle:5,1')->group(function () {
    Route::post('/acquisition', [AcquisitionController::class, 'store'])->name('acquisition.store');
});
Route::get('/acquisition', [AcquisitionController::class, 'show'])->name('acquisition.show');
Route::get('/acquisition/success', [AcquisitionController::class, 'success'])->name('acquisition.success');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReportApiController;

Route::prefix('v1')->group(function () {

    // =====================
    // AUTH API (MOBILE)
    // =====================
    Route::prefix('auth')->group(function () {
        Route::post('/login',  [AuthController::class, 'login']);
        Route::post('/google', [AuthController::class, 'google']);
    });

    // =====================
    // REPORT API (MOBILE)
    // =====================
    Route::middleware('auth:sanctum')->group(function () {
        Route::get('/reports', [ReportApiController::class, 'index']);
        Route::post('/reports', [ReportApiController::class, 'store']);
        Route::get('/reports/{id}', [ReportApiController::class, 'show']);
    });

});

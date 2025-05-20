<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Api\AuthController;

// Laravel API のルート（POST /login や CSRF 取得）
Route::middleware('web')->group(function () {
    Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);
    Route::get('/sanctum/csrf-cookie', function () {
        return response()->noContent();
    });
});
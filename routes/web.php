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

// Vue SPA 用の Catch-All ルート（最終行）
Route::get('/{any}', function () {
    return view('frontend.index');
})->where('any', '.*')->name('spa');
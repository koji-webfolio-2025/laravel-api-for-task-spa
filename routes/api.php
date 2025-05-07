<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;

// 動作確認用エンドポイント
Route::get('/test', function () {
    return response()->json(['message' => 'Hello from Laravel!']);
});

// CSRFトークン取得（開発用）
Route::get('/csrf-token', function () {
    return response()->json(['csrf_token' => csrf_token()]);
});

// ログインAPI（レートリミット付き）
Route::post('/login', [AuthController::class, 'login'])->middleware(['throttle:login']);

// タスクAPI
Route::apiResource('tasks', TaskController::class);

Route::middleware('api')->get('/tasks', [TaskController::class, 'index']);
Route::post('/logout', function () {
    Auth::logout();
    return response()->json(['message' => 'Logged out']);
});

Route::get('/test-cors', function () {
    \Illuminate\Support\Facades\Log::info('CORS check route was hit!');
    return response()->json(['message' => 'CORS OK']);
});

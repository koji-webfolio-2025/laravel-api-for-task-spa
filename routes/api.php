<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

// 動作確認用エンドポイント
Route::get('/test', function () {
    return response()->json(['message' => 'Hello from Laravel!']);
});

// CSRFトークン取得（開発用）
Route::middleware('web')->get('/csrf-token', function () {
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

Route::middleware('auth:sanctum')->get('/user', function (\Illuminate\Http\Request $request) {
    return response()->json(['user' => $request->user()]);
});

Route::get('/sanctum/csrf-cookie', [CsrfCookieController::class, 'show']);

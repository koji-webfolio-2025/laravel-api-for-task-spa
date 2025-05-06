<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

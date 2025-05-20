<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;
use Illuminate\Support\Facades\Log;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {
    Route::get('/me', fn(Request $request) => $request->user());
    Route::get('/user', fn(Request $request) => response()->json($request->user()));
    Route::apiResource('tasks', TaskController::class);
});
<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\TaskController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Http\Controllers\CsrfCookieController;

Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:api')->get('/me', fn(Request $request) => $request->user());
Route::middleware('auth:api')->apiResource('tasks', TaskController::class);
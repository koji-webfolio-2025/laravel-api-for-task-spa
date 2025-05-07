<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('web')->post('/login', [AuthController::class, 'login']);

Route::get('/sanctum/csrf-cookie', function () {
    return response()->noContent();
});

Route::get('/test-cors', function () {
    return response()->json(['message' => 'web.php CORS OK']);
});

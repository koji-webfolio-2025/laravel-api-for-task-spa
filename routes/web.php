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

Route::get('/app/{any}', function () {
    return file_get_contents(public_path('app/index.html'));
})->where('any', '.*');

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            config(['auth.defaults.guard' => 'web']);

            $credentials = $request->only('email', 'password');
            \Log::info('認証開始', $credentials);

            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                \Log::info('認証成功', ['user' => $user]);
                return response()->json(['user' => $user]);
            }

            \Log::warning('認証失敗', $credentials);
            return response()->json(['message' => 'Unauthorized'], 401);

        } catch (\Throwable $e) {
            \Log::error('ログイン中に例外発生: ' . $e->getMessage());
            return response()->json(['message' => 'Internal Server Error'], 500);
        }

    }
}

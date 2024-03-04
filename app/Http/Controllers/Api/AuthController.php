<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request): JsonResponse
    {
        $credentials = request(['email', 'password']);
        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken('api token - ' . $user->email);
        $token = $tokenResult->token;
        $token->save();
        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString(),
            'user_information' => [
                "uuid" => $user->uuid,
                "name" => $user->name
            ]
        ]);
    }

    public function logout(): JsonResponse
    {
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            return response()->json([
                'message' => 'Logout thành công.'
            ]);
        }
        return response()->json([
            'message' => 'Bạn chưa đăng nhập.'
        ]);
    }
}

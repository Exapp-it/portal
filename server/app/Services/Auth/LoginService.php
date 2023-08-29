<?php

namespace App\Services\Auth;

use App\Models\User;
use Auth;

use Illuminate\Auth\AuthenticationException;
use Json;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LoginService
{
    public function store(array $credentials)
    {
        try {
            $token = JWTAuth::attempt($credentials);

            if (!$token) {
                return ['error' => ['message' => 'Invalid credentials'], 'code' => 401];
            }

            return ['success' => ['access_token' => $token], 'code' => 200];
        } catch (JWTException $e) {
            return ['error' => ['message' => $e->getMessage()], 'code' => $e->getCode() ? $e->getCode() : 500];
        }
    }
}

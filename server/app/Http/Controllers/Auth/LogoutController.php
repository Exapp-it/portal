<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Json;
use JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class LogoutController extends Controller
{
    public function __invoke()
    {
        try {
            JWTAuth::invalidate(JWTAuth::getToken());
            return Json::success(['message' => 'Logged out successfully']);
        } catch (JWTException $e) {
            return Json::error(['message' => 'Failed to logout, please try again.'], 500);
        }
    }
}

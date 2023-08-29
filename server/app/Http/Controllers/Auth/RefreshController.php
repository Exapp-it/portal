<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Json;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class RefreshController extends Controller
{
    function __invoke()
    {
        try {
            $newToken = JWTAuth::parseToken()->refresh();
            return Json::success(['access_token' => $newToken]);
        } catch (JWTException $e) {
            return Json::error(['message' => 'Could not refresh the token'], 500);
        }
    }
}

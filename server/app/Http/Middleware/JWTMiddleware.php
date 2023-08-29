<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Json;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
            if (!$user) {
                return Json::error(['message' => 'user not found'], 500);
            }
        } catch (JWTException $e) {
            return Json::error(['message' =>  $e->getMessage()], 500);
        }
        return $next($request);
    }
}

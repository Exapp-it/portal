<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;
use Json;

class MeController extends Controller
{
    public function __invoke() {
        return Json::success(['user' => new UserResource(Auth::user())]);
    }
    
}

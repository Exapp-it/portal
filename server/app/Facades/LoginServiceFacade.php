<?php

namespace App\Facades;

use App\Services\Auth\LoginService;
use Illuminate\Support\Facades\Facade;

class LoginServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return LoginService::class;
    }
}

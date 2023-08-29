<?php

namespace App\Facades;

use App\Services\Auth\RegisterService;
use Illuminate\Support\Facades\Facade;

class RegisterServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return RegisterService::class;
    }
}

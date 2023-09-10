<?php

namespace App\Facades;

use App\Helpers\Json;
use Illuminate\Support\Facades\Facade;

class JsonFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Json::class;
    }
}

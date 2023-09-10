<?php

return [

    'roles' => [
        'admin' => 1,
        'user' => 2,
        'manager' => 3,
        'operator' => 4,
        "developer" => 5,
    ],


    'status' => [
        'active' => 1,
        'inactive' => 2,
        'stopped' => 3,
        'banned' => 5,
        'deleted' => 6,
    ],

    'currencies' => [
        'USD',
        'EUR',
        'RUB',
    ],

    'token_salt' => env('TOKEN_SALT', 'exapp'),
];

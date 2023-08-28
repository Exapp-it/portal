<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        'status' => 'Success',
        'message' => 'Is Ok',
    ]);
});

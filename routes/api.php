<?php

use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\MeController;
use App\Http\Controllers\Auth\RefreshController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return response()->json([
        'status' => 'Success',
        'message' => 'Api is in working order...',
    ]);
});


Route::prefix('auth')->group(function () {
    Route::post(
        'register',
        RegisterController::class
    );

    Route::post(
        'login',
        LoginController::class
    );

    Route::post(
        'password/email',
        [ForgotPasswordController::class, 'sendResetLinkEmail']
    );

    Route::post(
        'password/reset',
        [ResetPasswordController::class, 'reset']
    )->name('password.reset');



    Route::middleware('session')->group(function () {
        Route::get('google', [GoogleController::class, 'redirectToGoogle']);
        Route::get('google/callback', [GoogleController::class, 'handleGoogleCallback']);
    });



    Route::middleware('jwt.verify')->group(function () {
        Route::post(
            'me',
            MeController::class
        );
        Route::post(
            'refresh',
            RefreshController::class
        );
        Route::post(
            'logout',
            LogoutController::class
        );
    });
});

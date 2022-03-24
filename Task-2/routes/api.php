<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use App\Http\Controllers\Api\V1\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class)
    ->name('user.register');

Route::post('/login', LoginController::class)
    ->name('user.login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', LogoutController::class)
        ->name('user.logout');

    Route::apiResource('user', UserController::class)
        ->except('store');
});

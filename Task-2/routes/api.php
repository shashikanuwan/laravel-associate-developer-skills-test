<?php

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::post('/register', RegisterController::class)
    ->name('user.register');

Route::post('/login', LoginController::class)
    ->name('user.login');

Route::get('/logout', LogoutController::class)
    ->name('user.logout');

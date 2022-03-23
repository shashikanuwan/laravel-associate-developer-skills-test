<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('company', CompanyController::class);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard',  DashboardController::class)
        ->name('dashboard');

    Route::get('/user/dashboard',  UserDashboardController::class)
        ->name('user.dashboard');

    Route::get('/admin/dashboard',  AdminDashboardController::class)
        ->name('admin.dashboard');
});

<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', HomeController::class)->name('welcome');
Route::resource('company', CompanyController::class)->except('show');
Route::resource('employee', EmployeeController::class)->except('show');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard',  DashboardController::class)->name('dashboard');
    Route::get('/user/dashboard',  UserDashboardController::class)->name('user.dashboard');
    Route::get('/admin/dashboard',  AdminDashboardController::class)->name('admin.dashboard');
});

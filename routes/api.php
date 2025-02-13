<?php

use App\Http\Controllers\Api\Admin\AdminForgetPasswordController;
use App\Http\Controllers\Api\Admin\AdminLoginController;
use App\Http\Controllers\Api\Admin\AdminLogoutController;
use App\Http\Controllers\Api\Admin\AdminResetPasswordController;
use App\Http\Controllers\Api\Customer\CustomerForgetPasswordController;
use App\Http\Controllers\Api\Customer\CustomerLoginController;
use App\Http\Controllers\Api\Customer\CustomerLogoutController;
use App\Http\Controllers\Api\Customer\CustomerResetPasswordController;
use Illuminate\Support\Facades\Route;

/* customer's routes */
Route::post('/login', CustomerLoginController::class);
Route::post('forgot-password', CustomerForgetPasswordController::class);
Route::post('reset-password', CustomerResetPasswordController::class)->name('password.reset');

Route::middleware(['auth:customer'])->group(function () { // protected customer's routes
    Route::post('/logout', CustomerLogoutController::class);
});

/* admin's routes */
Route::post('admin/login', AdminLoginController::class);
Route::post('admin/forgot-password', AdminForgetPasswordController::class);
Route::post('admin/reset-password', AdminResetPasswordController::class)->name('admin.password.reset');

Route::middleware(['auth:user'])->group(function () { // protected user's routes
    Route::post('admin/logout', AdminLogoutController::class);
});

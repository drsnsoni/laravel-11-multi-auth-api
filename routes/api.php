<?php

use App\Http\Controllers\Api\Admin\AdminLoginController;
use App\Http\Controllers\Api\Admin\AdminLogoutController;
use App\Http\Controllers\Api\Customer\CustomerLoginController;
use App\Http\Controllers\Api\Customer\CustomerLogoutController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

/* customer routes */
Route::post('/login', CustomerLoginController::class);
Route::middleware(['auth:customer'])->group(function () {
    Route::post('/logout', CustomerLogoutController::class);
});

/* admin routes */
Route::post('admin/login', AdminLoginController::class);
Route::middleware(['auth:user'])->group(function () {
    Route::post('admin/logout', AdminLogoutController::class);
});

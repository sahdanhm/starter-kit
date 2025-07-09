<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

Route::middleware('guest')->group(function () {
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login')->name('login');
        Route::get('/login',  'index')->name('login.page');
        Route::post('/forgot-password', 'sendPasswordResetLink')->name('password.forgot');
        Route::get('/forgot-password', 'forgotPassword')->name('password.forgot.page');
        Route::get('/reset-password/{token}', 'resetPassword')->name('password.reset');
        Route::post('/reset-password', 'updatePassword')->name('password.update');
    });
});
Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::put('/settings/save', [UserController::class, 'saveSettings'])->name('settings.save');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

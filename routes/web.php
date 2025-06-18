<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

Route::middleware(['guest'])->group(function () {
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/login',  [UserController::class, 'index'])->name('login-page');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::put('/settings/save', [UserController::class, 'saveSettings'])->name('settings.save');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

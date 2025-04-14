<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::middleware(['guest'])->group(function () {
    Route::post('/login', [UserController::class, 'login'])->name('login');
    Route::get('/login',  [UserController::class, 'index'])->name('login-page');
});
Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
});

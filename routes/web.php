<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::prefix('/dashboard')->middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [LoginController::class, 'authenticate'])
        ->name('login.post');

    Route::get('/register', [RegisterController::class, 'showRegisteration'])
        ->name('register');

    Route::post('/register', [RegisterController::class, 'register'])
        ->name('register.post');
});

Route::prefix('/dashboard')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

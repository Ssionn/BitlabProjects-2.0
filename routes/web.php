<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RepositoryController;
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
    Route::post('/dispatch-job', [DashboardController::class, 'getRepositories'])->name('dispatch.job');

    Route::get('/repositories/view', [RepositoryController::class, 'index'])->name('repositories');
    Route::get('/repositories/view/{id}', [RepositoryController::class, 'show'])->name('repositories.show');

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

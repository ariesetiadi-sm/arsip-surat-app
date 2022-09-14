<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

// Un-authenticated Routes
Route::middleware('guest')->group(function () {
    // Login
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login');

    // Register
    Route::get('register', [RegisterController::class, 'index'])->name('register');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::get('logout', [LogoutController::class, 'logout'])->name('logout');

    // Dashboard
    Route::get('/', function () {
        return view('dashboard');
    });
});

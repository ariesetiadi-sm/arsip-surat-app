<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

// Un-authenticated Routes
Route::middleware('guest')->group(function () {
    // Login
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    // Register
    Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register', [RegisterController::class, 'register']);
});

// Authenticated Routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::get('/logout', [LogoutController::class, 'logout']);
    // Profile
    Route::get('/profile', [PenggunaController::class, 'profile']);
    Route::post('/profile/update', [PenggunaController::class, 'updateProfile']);
    Route::post('/profile/update-photo', [PenggunaController::class, 'updatePhoto']);

    // Dashboard
    Route::get('/', function () {
        return view('dashboard');
    });
});

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BanjirController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return redirect()->route('laporan.form');
});

// Form pelaporan tetap dapat diakses masyarakat tanpa login.
Route::get('/laporbanjir', [BanjirController::class, 'form'])
    ->name('laporan.form');
Route::post('/laporbanjir/proses', [BanjirController::class, 'proses'])
    ->name('laporan.proses');

// Authentication manual.
Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'create'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [LoginController::class, 'create'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Hanya petugas yang sudah login dapat mengakses data laporan dan profil.
Route::middleware('auth')->group(function () {
    Route::get('/laporan', [BanjirController::class, 'index'])
        ->name('laporan.index');
    Route::get('/profil', [HomeController::class, 'profile'])
        ->name('profile');
});

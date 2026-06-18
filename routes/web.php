<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/auth/login', [LoginController::class, 'index'])->name('login');

Route::get('/auth/registry', [RegisterController::class, 'index'])->name('registry');
Route::post('/auth/registry', [RegisterController::class, 'store'])->name('registry.store');

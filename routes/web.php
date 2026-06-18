<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/auth/login', [LoginController::class, 'index'])->name('login');

Route::get('/auth/registry', [RegisterController::class, 'index'])->name('registry');
Route::post('/auth/registry', [RegisterController::class, 'store'])->name('registry.store');

// Muestra el aviso "verifica tu correo"
Route::get('/email/verify', function() {
    return view('auth.verify-email');
})->middleware(['auth'])->name('verification.notice');


// Maneja el click del link en el correo
Route::get('/email/verify/{id}/{hash}', function(EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect()->route('dashboard')->with('success', 'Tu correo fue verificado Correctamente.');
})->middleware(['auth', 'signed'])->name('verification.verify');





<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\StaticLanguageController;
use App\Http\Controllers\VerifyEmailController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('language/{locale}', [StaticLanguageController::class, 'index']);
Route::view('/dashboard', 'dashboard.dashboard')->middleware('auth');

Route::get('/email/verify', [VerifyEmailController::class, 'index'])->middleware('auth')->name('verification.notice');

Route::get('/email_confirmed', [VerifyEmailController::class, 'show'])->name('confirmed');

Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'store'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware('guest')->group(function () {
	Route::view('/', 'login.login-form')->name('login.get');
	Route::post('/login', [LoginController::class, 'store'])->name('login.post');
	Route::view('/register', 'register.register')->name('register.get');
	Route::post('/register', [RegisterController::class, 'store'])->name('register.post');

	Route::view('/forgot-password', 'password.forgot-password')->name('password.request');
	Route::post('/forgot-password', [ResetPasswordController::class, 'store'])->name('password.email');
	Route::view('/password/reset/verify', 'email.verify-email')->name('password.notice');
	Route::get('/reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
	Route::post('/reset-password', [ResetPasswordController::class, 'update'])->name('password.update');
});

<?php

use App\Http\Controllers\DashboardController;
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

Route::middleware('auth')->group(function () {
	Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
	Route::prefix('/dashboard')->group(function () {
		Route::get('/', [DashboardController::class, 'worldwide'])->name('worldwide');
		Route::get('/countries', [DashboardController::class, 'countries'])->name('countries-list');
	});
	Route::view('/email/verify', 'email.verify-email')->name('verification.notice');
});

Route::controller(VerifyEmailController::class)->group(function () {
	Route::get('/email_confirmed', 'emailConfirmed')->name('confirmed');
	Route::get('/email/verify/{id}/{hash}', 'store')->middleware(['auth', 'signed'])->name('verification.verify');
});

Route::middleware('guest')->group(function () {
	Route::view('/', 'login.login-form')->name('login.get');
	Route::post('/login', [LoginController::class, 'store'])->name('login.post');
	Route::view('/register', 'register.register')->name('register.get');
	Route::post('/register', [RegisterController::class, 'store'])->name('register.post');
	Route::controller(ResetPasswordController::class)->group(function () {
		Route::post('/forgot-password', 'store')->name('password.email');
		Route::get('/reset-password/{token}', 'create')->name('password.reset');
		Route::post('/reset-password', 'update')->name('password.update');
		Route::view('/password-updated', 'email.password-updated')->name('password.updated');
	});
	Route::view('/forgot-password', 'password.forgot-password')->name('password.request');
	Route::view('/password/reset/verify', 'email.verify-email')->name('password.notice');
});

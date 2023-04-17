<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\StaticLanguageController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
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

Route::get('/email/verify', function () {
	return view('components.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
	$request->fulfill();

	return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::middleware('guest')->group(function () {
	Route::get('/', [LoginController::class, 'index'])->name('login.get');
	Route::post('/login', [LoginController::class, 'store'])->name('login.post');
	Route::get('/register', [RegisterController::class, 'index'])->name('register.get');
	Route::post('/register', [RegisterController::class, 'store'])->name('register.post');
});

Route::view('/dashboard', 'dashboard.dashboard');

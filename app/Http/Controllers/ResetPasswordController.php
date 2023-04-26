<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResetPasswordRequest;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ResetPasswordController extends Controller
{
	public function index(): View
	{
		return view('password.forgot-password');
	}

	public function store(ResetPasswordRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		$status = Password::sendResetLink(
			$request->only('email')
		);

		return $status === Password::RESET_LINK_SENT
					? redirect()->route('password.notice')
					: back()->withErrors(['email' => __($status)]);
	}

	public function create(string $token)
	{
		return view('password.reset-password', ['token' => $token, 'email' => request()->query('email')]);
	}

	public function show(): View
	{
		return view('email.verify-email');
	}

	public function update(UpdatePasswordRequest $request)
	{
		$validated = $request->validated();

		$status = Password::reset(
			$request->only('email', 'password', 'password_confirmation', 'token'),
			function (User $user, string $password) {
				$user->forceFill([
					'password' => Hash::make($password),
				])->setRememberToken(Str::random(60));

				$user->save();

				event(new PasswordReset($user));
			}
		);

		return $status === Password::PASSWORD_RESET
					? redirect()->route('login.get')->with('status', __($status))
					: back()->withErrors(['email' => [__($status)]]);
	}
}

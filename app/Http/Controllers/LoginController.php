<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
	public function store(StoreLoginRequest $request): RedirectResponse
	{
		$validated = $request->validated();
		$username_or_email = $validated['username'];
		$password = $validated['password'];
		$user = User::where('username', $username_or_email)->first();
		$remember_me = (!empty($request->remember_device)) ? true : false;

		if (empty($user)) {
			$user = User::where('email', $username_or_email)->first();
		}

		if (empty($user)) {
			return back()->withErrors([
				'username' => __('Username or email not available in database'),
			])->onlyInput('username');
		}

		if (auth()->attempt(['username' => $user->username, 'email' => $user->email, 'password' => $password], $remember_me)) {
			return redirect('/dashboard');
		}

		return back()->withErrors([
			'password' => 'Password is incorrect',
		])->onlyInput('password');
	}

	public function logout(): RedirectResponse
	{
		auth()->logout();
		return redirect('/');
	}
}

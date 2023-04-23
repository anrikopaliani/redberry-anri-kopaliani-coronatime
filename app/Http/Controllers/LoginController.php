<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
	public function index()
	{
		return view('login.login-form');
	}

	public function store(StoreLoginRequest $request)
	{
		$validated = $request->validated();
		$username_or_email = $validated['username'];
		$password = $validated['password'];
		$user = User::where('username', $username_or_email)->first();

		if (empty($user)) {
			$user = User::where('email', $username_or_email)->first();
		}

		if (empty($user)) {
			return back()->withErrors([
				'username' => __('Username or email not available in database'),
			])->onlyInput('username');
		}

		if (Auth::attempt(['username' => $user->username, 'email' => $user->email, 'password' => $password])) {
			return redirect('/dashboard');
		}

		return back()->withErrors([
			'password' => 'Password is incorrect',
		])->onlyInput('password');
	}
}

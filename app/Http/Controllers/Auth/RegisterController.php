<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;

class RegisterController extends Controller
{
	public function store(StoreRegisterRequest $request): RedirectResponse
	{
		$validated = $request->validated();

		$user = User::create([
			'username' => $validated['username'],
			'email'    => $validated['email'],
			'password' => bcrypt($validated['password']),
		]);

		event(new Registered($user));

		auth()->attempt($validated);

		return redirect()->route('verification.notice');
	}
}

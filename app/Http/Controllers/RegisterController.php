<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;
use App\Models\User;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
	public function index()
	{
		return view('register.register');
	}

	public function store(StoreRegisterRequest $request)
	{
		$validated = $request->validated();

		$user = User::create([
			'username' => $validated['username'],
			'email'    => $validated['email'],
			'password' => bcrypt($validated['password']),
		]);

		event(new Registered($user));

		return view('components.verify-email');
	}
}

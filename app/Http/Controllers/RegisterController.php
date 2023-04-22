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

		$user = User::create($validated);

		event(new Registered($user));

		$user->markEmailAsVerified();

		return view('components.verify-email');
	}
}

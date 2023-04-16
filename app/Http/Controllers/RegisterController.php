<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRegisterRequest;

class RegisterController extends Controller
{
	public function index()
	{
		return view('register.register');
	}

	public function store(StoreRegisterRequest $request)
	{
		$validated = $request->validated();
	}
}

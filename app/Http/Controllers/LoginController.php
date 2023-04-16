<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoginRequest;

class LoginController extends Controller
{
	public function index()
	{
		return view('login.login-form');
	}

	public function store(StoreLoginRequest $request)
	{
		$validated = $request->validated();
	}
}

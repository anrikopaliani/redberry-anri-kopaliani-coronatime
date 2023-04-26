<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{
	public function index(): View
	{
		return view('email.verify-email');
	}

	public function store(EmailVerificationRequest $request)
	{
		$request->fulfill();

		return redirect()->route('confirmed');
	}

	public function show()
	{
		auth()->logout();
		return view('email.email-confirmed');
	}
}

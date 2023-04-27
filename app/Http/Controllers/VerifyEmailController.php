<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class VerifyEmailController extends Controller
{
	public function store(EmailVerificationRequest $request): RedirectResponse
	{
		$request->fulfill();

		return redirect()->route('confirmed');
	}

	public function emailConfirmed(): View
	{
		auth()->logout();
		return view('email.email-confirmed');
	}
}

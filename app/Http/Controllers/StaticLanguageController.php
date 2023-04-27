<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

class StaticLanguageController extends Controller
{
	public function index($locale): RedirectResponse
	{
		app()->setLocale($locale);
		session()->put('locale', $locale);
		return redirect()->back();
	}
}

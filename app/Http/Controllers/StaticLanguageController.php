<?php

namespace App\Http\Controllers;

class StaticLanguageController extends Controller
{
	public function index($locale)
	{
		app()->setLocale($locale);
		session()->put('locale', $locale);
		return redirect()->back();
	}
}

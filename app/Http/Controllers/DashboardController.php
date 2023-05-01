<?php

namespace App\Http\Controllers;

use App\Models\CountryStatistic;
use Illuminate\View\View;

class DashboardController extends Controller
{
	public function worldwide(): View
	{
		$newCases = CountryStatistic::all()->sum('confirmed');
		$recovered = CountryStatistic::all()->sum('recovered');
		$deaths = CountryStatistic::all()->sum('deaths');

		return view('dashboard.worldwide', [
			'deaths'    => $deaths,
			'recovered' => $recovered,
			'newCases'  => $newCases,
		]);
	}
}

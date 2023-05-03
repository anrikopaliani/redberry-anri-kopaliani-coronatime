<?php

namespace App\Http\Controllers;

use App\Models\Country;
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

	public function countries(): View
	{
		$stats = Country::query()->join('country_statistics', 'country_statistics.code', 'countries.code')->get();
		$countryDetails = collect($stats);

		if (request('search')) {
			$filtered = $countryDetails->filter(function ($country) {
				return $country->getTranslation('name', app()->getLocale()) == request('search');
			});
		} else {
			$filtered = $countryDetails;
		}

		return view('dashboard.countries', ['list' => $filtered->all()]);
	}
}

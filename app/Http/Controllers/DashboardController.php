<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\CountryStatistic;
use Illuminate\View\View;
use Illuminate\Support\Str;

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
		$stats = Country::query()->join('country_statistics', 'country_statistics.code', 'countries.code')->get()->all();
		$countryDetails = collect($stats);

		if (request('search')) {
			$filtered = $countryDetails->filter(function ($country) {
				return 	Str::contains(strtolower($country->getTranslation('name', app()->getLocale())), strtolower(request('search')));
			});
		} else {
			$filtered = $countryDetails;
		}

		if (request('location') === 'asc') {
			$filtered = $filtered->sortBy(['country', 'asc']);
		}
		if (request('location') === 'desc') {
			$filtered = $filtered->sortByDesc('country');
		}

		if (request('cases') === 'asc') {
			$filtered = $filtered->sortBy(['confirmed', 'asc']);
		}
		if (request('cases') === 'desc') {
			$filtered = $filtered->sortByDesc('confirmed');
		}

		if (request('deaths') === 'asc') {
			$filtered = $filtered->sortBy(['deaths', 'asc']);
		}
		if (request('deaths') === 'desc') {
			$filtered = $filtered->sortByDesc('deaths');
		}

		if (request('recovered') === 'asc') {
			$filtered = $filtered->sortBy(['recovered', 'asc']);
		}
		if (request('recovered') === 'desc') {
			$filtered = $filtered->sortByDesc('recovered');
		}

		return view('dashboard.countries', ['list' => $filtered->all(), 'countryDetails' => $countryDetails]);
	}
}

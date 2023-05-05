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

		$sortingName = '';
		$requestFilterdParam = '';

		if (request()->has('location')) {
			$sortingName = 'country';
			$requestFilterdParam = 'location';
		} elseif (request()->has('cases')) {
			$sortingName = 'confirmed';
			$requestFilterdParam = 'cases';
		} elseif (request()->has('deaths')) {
			$sortingName = 'deaths';
			$requestFilterdParam = 'deaths';
		} elseif (request()->has('recovered')) {
			$sortingName = 'recovered';
			$requestFilterdParam = 'recovered';
		}
		if (request($requestFilterdParam) === 'asc') {
			$filtered = $filtered->sortBy([$sortingName, 'asc']);
		} else {
			$filtered = $filtered->sortByDesc($sortingName);
		}

		return view('dashboard.countries', ['list' => $filtered->all(), 'countryDetails' => $countryDetails]);
	}
}

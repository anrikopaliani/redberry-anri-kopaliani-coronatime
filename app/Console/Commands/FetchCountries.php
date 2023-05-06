<?php

namespace App\Console\Commands;

use App\Models\Country;
use App\Models\CountryStatistic;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class FetchCountries extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'coronatime:fetch-countries';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Command description';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		$countries = json_decode(Http::connectTimeout(100)->get('https://devtest.ge/countries')->body());

		foreach ($countries as $country) {
			$countryExists = Country::where('code', $country->code)->first();

			if (is_null($countryExists)) {
				Country::create([
					'code' => $country->code,
					'name' => [
						'en' => $country->name->en,
						'ka' => $country->name->ka,
					],
				]);
			} else {
				$countryExists->name = [
					'en' => $country->name->en,
					'ka' => $country->name->ka,
				];
				$countryExists->update();
			}

			$stats = json_decode(Http::connectTimeout(100)->post('https://devtest.ge/get-country-statistics', [
				'code' => $country->code,
			]));

			$statExists = CountryStatistic::where('code', $country->code)->first();

			if (is_null($statExists)) {
				CountryStatistic::create([
					'code'      => $stats->code,
					'country'   => $stats->country,
					'confirmed' => $stats->confirmed,
					'recovered' => $stats->recovered,
					'deaths'    => $stats->deaths,
					'critical'  => $stats->critical,
				]);
			} else {
				$statExists->confirmed = $stats->confirmed;
				$statExists->recovered = $stats->recovered;
				$statExists->deaths = $stats->deaths;
				$statExists->critical = $stats->critical;

				$statExists->update();
			}
		}
	}
}

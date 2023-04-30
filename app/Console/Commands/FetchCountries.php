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
			Country::updateOrCreate([
				'code' => $country->code,
				'name' => json_encode($country->name),
			]);

			$stats = json_decode(Http::connectTimeout(100)->post('https://devtest.ge/get-country-statistics', [
				'code' => $country->code,
			]));

			CountryStatistic::updateOrCreate([
				'code'      => $stats->code,
				'country'   => $stats->country,
				'confirmed' => $stats->confirmed,
				'critical'  => $stats->critical,
				'deaths'    => $stats->deaths,
				'recovered' => $stats->recovered,
			]);
		}
	}
}

<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\CountryStatistic;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class CommandTest extends TestCase
{
	public function test_command(): void
	{
		Http::fake([
			'https://devtest.ge/countries' => Http::response(json_encode([['code' => 'AF', 'name' => ['en' => 'Afghanistan', 'ka' => 'ავღანეთი']]]), 200),
		]);

		$response = Http::post('https://devtest.ge/get-country-statistics', ['code' => 'AF'])->body();
		$this->artisan('coronatime:fetch-countries')->assertSuccessful();
	}

	public function test_if_record_doesnt_exist_in_countries_it_will_create_it()
	{
		Country::where('code', 'test')->delete();
		CountryStatistic::where('code', 'test')->delete();
		$this->assertDatabaseMissing('countries', ['code' => 'test']);
		$this->assertDatabaseMissing('country_statistics', ['code' => 'test']);

		Http::fake([
			'https://devtest.ge/countries' => Http::response(json_encode([['code' => 'test', 'name' => ['en' => 'test', 'ka' => 'test']]]), 200),

			'https://devtest.ge/get-country-statistics' => Http::response(json_encode([
				'code'     => 'test',
				'country'  => 'test',
				'code'     => 'test',
				'confirmed'=> 1,
				'recovered'=> 1,
				'critical' => 1,
				'deaths'   => 1,
			])), 200,
		]);
		$this->artisan('coronatime:fetch-countries')->assertSuccessful();

		$this->assertDatabaseHas('countries', ['code' => 'test']);
		$this->assertDatabaseHas('country_statistics', ['code' => 'test']);
		Country::where('code', 'test')->delete();
		CountryStatistic::where('code', 'test')->delete();
	}
}

<?php

namespace Tests\Feature;

use App\Models\Country;
use App\Models\CountryStatistic;
use Tests\TestCase;

class CommandTest extends TestCase
{
	public function test_command(): void
	{
		$this->artisan('coronatime:fetch-countries')->assertExitCode(0);
	}

	public function test_if_record_doesnt_exist_in_countries_it_will_create_it_()
	{
		$res = Country::first();
		Country::first()->delete();

		$this->assertDatabaseMissing('countries', ['code' => $res->code]);

		$this->artisan('coronatime:fetch-countries')->assertSuccessful();

		$this->assertDatabaseHas('countries', ['code' => $res->code]);
	}

	public function test_if_record_doesnt_exists_statistics_it_will_create_it()
	{
		$res = CountryStatistic::first();
		CountryStatistic::first()->delete();

		$this->assertDatabaseMissing('country_statistics', ['code' => $res->code]);

		$this->artisan('coronatime:fetch-countries')->assertSuccessful();

		$this->assertDatabaseHas('country_statistics', ['code' => $res->code]);
	}
}

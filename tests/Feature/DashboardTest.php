<?php

namespace Tests\Feature;

use App\Models\CountryStatistic;
use App\Models\User;
use Tests\TestCase;

class DashboardTest extends TestCase
{
	public function test_should_redirect_to_login_page_if_not_authenticated()
	{
		$response = $this->get(route('worldwide'));
		$response->assertRedirect(route('login.get'));
	}

	public function test_should_redirect_to_login_page_if_not_authenticated_when_visiting_coutries_list()
	{
		$response = $this->get(route('countries-list'));

		$response->assertRedirect(route('login.get'));
	}

	public function test_should_redirect_to_login_page_if_not_verified_when_visiting_worldwide_page()
	{
		$user = User::factory()->create(['email_verified_at' => null]);

		$response = $this->actingAs($user)->get(route('worldwide'));

		$response->assertRedirect(route('login.get'));
		$response->assertSessionHasErrors(['username']);
	}

	public function test_should_redirect_to_login_page_if_not_verified_when_visiting_countries_list_page()
	{
		$user = User::factory()->create(['email_verified_at' => null]);

		$response = $this->actingAs($user)->get(route('countries-list'));

		$response->assertRedirect(route('login.get'));
		$response->assertSessionHasErrors(['username']);
	}

	public function test_should_show_dashboard_if_user_is_verified()
	{
		$user = User::factory()->create();

		$response = $this->actingAs($user)->get(route('worldwide'));
		$response->assertSuccessful();
		$response->assertViewIs('dashboard.worldwide');
	}

	public function test_should_show_countries_list_page_if_user_is_verified()
	{
		$user = User::factory()->create();

		$response = $this->actingAs($user)->get(route('countries-list'));
		$response->assertSuccessful();
		$response->assertViewIs('dashboard.countries');
	}

	public function test_logout_functionality()
	{
		$this->withoutMiddleware();
		$user = User::factory()->create();

		$response = $this->actingAs($user)->post(route('logout'));
		$response->assertRedirect(route('login.get'));
		$this->assertGuest();
	}

	public function test_searching_funcionality()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get(route('countries-list', ['search' => 'Afghanistan']));

		$response->assertSee('Afghanistan');
		$response->assertDontSee('Albania');
	}

	public function test_location_descend_functionality()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get(route('countries-list', ['location' => 'desc']));
		$response->assertSeeInOrder(['Zimbabwe', 'Zambia']);
	}

	public function test_location_ascend_functionality()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get(route('countries-list', ['location' => 'asc']));
		$response->assertSeeInOrder(['Afghanistan', 'Albania']);
	}

	public function test_cases_descend_functionality()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get(route('countries-list', ['cases' => 'desc']));
		$stats = CountryStatistic::orderBy('confirmed', 'desc')->get();
		$response->assertSeeInOrder([$stats[0]->country, $stats[1]->country]);
	}

	public function test_cases_ascend_functionality()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get(route('countries-list', ['cases' => 'asc']));
		$stats = CountryStatistic::orderBy('confirmed', 'asc')->get();
		$response->assertSeeInOrder([$stats[0]->country, $stats[1]->country]);
	}

	public function test_deaths_ascend_functionality()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get(route('countries-list', ['deaths' => 'asc']));
		$stats = CountryStatistic::orderBy('deaths', 'asc')->get();
		$response->assertSeeInOrder([$stats[0]->country, $stats[1]->country]);
	}

	public function test_deaths_descend_functionality()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get(route('countries-list', ['deaths' => 'desc']));
		$stats = CountryStatistic::orderBy('deaths', 'desc')->get();
		$response->assertSeeInOrder([$stats[0]->country, $stats[1]->country]);
	}

	public function test_recovered_ascend_functionality()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get(route('countries-list', ['recovered' => 'asc']));
		$stats = CountryStatistic::orderBy('recovered', 'asc')->get();
		$response->assertSeeInOrder([$stats[0]->country, $stats[1]->country]);
	}

	public function test_recovered_descend_functionality()
	{
		$user = User::factory()->create();
		$response = $this->actingAs($user)->get(route('countries-list', ['recovered' => 'desc']));
		$stats = CountryStatistic::orderBy('recovered', 'desc')->get();
		$response->assertSeeInOrder([$stats[0]->country, $stats[1]->country]);
	}
}

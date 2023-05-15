<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class RegisterTest extends TestCase
{
	public function test_register_page_is_accessible()
	{
		$response = $this->get('/register');

		$response->assertSuccessful();

		$response->assertViewIs('register.register');
	}

	public function test_show_errors_if_no_input_is_provided()
	{
		$this->withoutMiddleware();

		$response = $this->post('/register');

		$response->assertSessionHasErrors([
			'username',
			'password',
			'email',
			'password_confirmation',
		]);
	}

	public function test_show_error_if_username_length_is_less_than_3()
	{
		$this->withoutMiddleware();

		$response = $this->post('/register', [
			'username'              => 'a',
			'password'              => '123',
			'password_confirmation' => '123',
			'email'                 => 'test@example.com',
		]);
		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_show_error_if_username_already_exists()
	{
		$this->withoutMiddleware();

		$user = User::factory()->create();
		$response = $this->post('/register', [
			'username'              => $user->username,
			'password'              => '123',
			'password_confirmation' => '123',
			'email'                 => 'test@example.com',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);
	}

	public function test_show_error_if_invalid_email_format()
	{
		$this->withoutMiddleware();

		$response = $this->post('/register', [
			'username'              => fake()->name(),
			'password'              => '123',
			'password_confirmation' => '123',
			'email'                 => 'invalid email format',
		]);

		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_show_error_if_email_already_exists()
	{
		$this->withoutMiddleware();
		$user = User::factory()->create();

		$response = $this->post('/register', [
			'username' => fake()->name(),
			'password' => '123',
			'password' => '123',
			'email'    => $user->email,
		]);

		$response->assertSessionHasErrors([
			'email',
		]);
	}

	public function test_show_error_if_password_length_is_less_than_3()
	{
		$this->withoutMiddleware();

		$response = $this->post('/register', [
			'username' => fake()->name(),
			'password' => '12',
			'password' => '12',
			'email'    => 'test@example.com',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_show_error_if_both_password_inputs_do_not_match()
	{
		$this->withoutMiddleware();

		$response = $this->post('/register', [
			'username'              => fake()->name(),
			'password'              => '123',
			'password_confirmation' => '1244',
			'email'                 => 'test@example.com',
		]);
		$response->assertSessionHasErrors([
			'password',
		]);
	}

	public function test_if_credentials_are_correct_redirect()
	{
		$this->withoutMiddleware();

		$response = $this->post('/register', [
			'username'              => fake()->name(),
			'password'              => '123',
			'password_confirmation' => '123',
			'email'                 => fake()->email(),
		]);

		$response->assertRedirect(route('verification.notice'));
	}

	public function test_verify_user()
	{
		$user = User::factory()->create(['email_verified_at' => null]);

		$verificationUrl = URL::temporarySignedRoute(
			'verification.verify',
			now()->addMinutes(60),
			['id' => $user->id, 'hash' => sha1($user->email)]
		);
		$this->assertFalse($user->hasVerifiedEmail());

		$response = $this->actingAs($user)->get($verificationUrl);

		$this->assertTrue(User::find($user->id)->hasVerifiedEmail());

		$response->assertRedirect(route('confirmed'));
	}
}

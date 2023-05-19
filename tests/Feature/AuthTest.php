<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AuthTest extends TestCase
{
	public function test_login_page_is_accessible()
	{
		$response = $this->get('/');
		$response->assertSuccessful();
		$response->assertViewIs('login.login-form');
	}

	public function test_auth_should_give_errors_if_no_input_is_provided()
	{
		$this->withoutMiddleware();
		$response = $this->post('/login');
		$response->assertSessionHasErrors([
			'username', 'password',
		]);
	}

	public function test_auth_should_give_error_if_password_is_not_provided()
	{
		$this->withoutMiddleware();

		$response = $this->post('/login', [
			'username' => 'example@gmail.com',
		]);

		$response->assertSessionHasErrors([
			'password',
		]);

		$response->assertSessionDoesntHaveErrors(['username']);
	}

	public function test_auth_should_give_error_if_username_is_not_provided()
	{
		$this->withoutMiddleware();

		$response = $this->post('/login', [
			'password' => '123',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);

		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_errors_if_username_length_is_less_than_3()
	{
		$this->withoutMiddleware();

		$response = $this->post('/login', [
			'username' => 'a',
			'password' => 'test',
		]);

		$response->assertSessionHasErrors([
			'username',
		]);

		$response->assertSessionDoesntHaveErrors(['password']);
	}

	public function test_auth_should_give_errors_if_user_doesnt_exist()
	{
		$this->withoutMiddleware();
		$response = $this->post('/login', [
			'username' => 'testtesttest',
			'password' => 'test',
		]);

		$response->assertSessionHasErrors([
			'username' => 'Please provide correct credentials',
		]);
	}

	public function test_should_redirect_to_dashboard_if_correct_username_and_password_is_provided()
	{
		$this->withoutMiddleware();

		$name = fake()->name();
		$email = fake()->email();
		$password = 'test_password';

		User::factory()->create([
			'username'         => $name,
			'email'            => $email,
			'password'         => bcrypt($password),
		]);

		$response = $this->post('/login', [
			'username'     => $name,
			'password'     => $password,
		]);

		$response->assertRedirect('/dashboard');
	}

	public function test_should_redirect_to_dashboard_if_correct_email_and_password_is_provided()
	{
		$this->withoutMiddleware();

		$name = fake()->name();
		$email = fake()->email();
		$password = 'test_password';

		User::factory()->create([
			'username'         => $name,
			'email'            => $email,
			'password'         => bcrypt($password),
		]);

		$response = $this->post('/login', [
			'username'        => $email,
			'password'        => $password,
		]);

		$response->assertRedirect('/dashboard');
	}

	public function test_remember_me_functionality()
	{
		$this->withoutMiddleware();

		$name = fake()->name();
		$email = fake()->email();
		$password = 'test_password';

		$user = User::factory()->create([
			'username'         => $name,
			'email'            => $email,
			'password'         => bcrypt($password),
		]);

		$response = $this->post('/login', [
			'username'    => $name,
			'password'    => $password,
			'remember_me' => true,
		]);

		$response->assertRedirect('/dashboard');

		$this->assertAuthenticatedAs($user);
	}

	public function test_if_user_exists_but_password_is_invalid()
	{
		$this->withoutMiddleware();

		$name = fake()->name();
		$email = fake()->email();
		$password = 'test_password';

		$user = User::factory()->create([
			'username'         => $name,
			'email'            => $email,
			'password'         => bcrypt($password),
		]);

		$response = $this->post('/login', [
			'username'    => $name,
			'password'    => '1234',
			'remember_me' => true,
		]);

		$response->assertSessionHasErrors(['password']);
	}
}

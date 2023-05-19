<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class ResetPasswordTest extends TestCase
{
	public function test_should_show_forgot_password_page()
	{
		$response = $this->get(route('password.request'));

		$response->assertViewIs('password.forgot-password');
	}

	public function test_should_show_error_if_email_is_not_provided()
	{
		$this->withoutMiddleware();
		$response = $this->post(route('password.request'));

		$response->assertSessionHasErrors(['email']);
	}

	public function test_should_show_error_if_email_is_incorrect_format()
	{
		$this->withoutMiddleware();

		$response = $this->post(route('password.request'), ['email' => '123']);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_should_show_error_if_user_with_that_email_doesnt_exist()
	{
		$this->withoutMiddleware();

		$response = $this->post(route('password.request'), ['email' => 'this_email_doesnt_exist@gmail.com']);

		$response->assertSessionHasErrors(['email']);
	}

	public function test_should_redirect_if_email_is_correct()
	{
		$this->withoutMiddleware();

		$user = User::factory()->create();

		$response = $this->post(route('password.request'), [
			'email' => $user->email,
		]);

		$response->assertRedirect(route('password.notice'));
	}

	public function test_user_cant_update_password_if_password_length_less_than_3()
	{
		$this->withoutMiddleware();

		$user = User::factory()->create();
		$token = Password::createToken($user);
		Event::fake();
		$response = $this->post(route('password.update'), [
			'password'              => 'ne',
			'password_confirmation' => 'ne',
			'token'                 => $token,
			'email'                 => $user->email,
		]);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_user_cant_update_password_if_passwords_do_not_match()
	{
		$this->withoutMiddleware();

		$user = User::factory()->create();
		$token = Password::createToken($user);
		Event::fake();
		$response = $this->post(route('password.update'), [
			'password'              => 'newpassword',
			'password_confirmation' => 'password',
			'token'                 => $token,
			'email'                 => $user->email,
		]);

		$response->assertSessionHasErrors(['password']);
	}

	public function test_user_can_update_their_password()
	{
		$this->withoutMiddleware();

		$user = User::factory()->create();

		$token = Password::createToken($user);

		Event::fake();

		$response = $this->post(route('password.update'), [
			'password'              => 'newpassword',
			'password_confirmation' => 'newpassword',
			'token'                 => $token,
			'email'                 => $user->email,
		]);

		$response->assertRedirect(route('password.updated'));

		$this->assertTrue(Hash::check('newpassword', User::find($user->id)->password));
		Event::assertDispatched(PasswordReset::class);
	}
}

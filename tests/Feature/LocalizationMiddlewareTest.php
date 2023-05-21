<?php

namespace Tests\Feature;

use Tests\TestCase;

class LocalizationMiddlewareTest extends TestCase
{
	/**
	 * A basic feature test example.
	 */
	public function test_example(): void
	{
		$response = $this->withSession(['locale' => 'ka'])->get('/')->assertStatus(200);
	}
}

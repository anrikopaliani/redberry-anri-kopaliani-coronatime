<?php

namespace Tests\Feature;

use Tests\TestCase;

class ChangeLanguageTest extends TestCase
{
	public function test_change_language_to_ka()
	{
		$this->get('/language/ka');
		$this->assertTrue(app()->getLocale() === 'ka');
	}

	public function test_change_language_to_en()
	{
		$this->get('/language/en');
		$this->assertTrue(app()->getLocale() === 'en');
	}
}

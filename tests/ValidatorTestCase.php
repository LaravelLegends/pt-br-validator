<?php

abstract class ValidatorTestCase extends TestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->app->register(\LaravelLegends\PtBrValidator\ValidatorProvider::class);
	}
}
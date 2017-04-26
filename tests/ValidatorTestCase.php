<?php

abstract class ValidatorTestCase extends Orchestra\Testbench\TestCase
{
	public function setUp()
	{
		parent::setUp();

		$this->app->register(\LaravelLegends\PtBrValidator\ValidatorProvider::class);
	}
}
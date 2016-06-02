<?php

use LaravelLegends\PtBrValidator\Validator;

class TestMessage extends TestCase
{

	public function __construct()
	{
		$this->refreshApplication();
	}


	public function testCelular()
	{
		$expected = 'O campo campo celular não contém um formato válido de celular';

		$validator = \Validator::make(
			['campo_celular' => '(41)5555-'],
			['campo_celular' => 'required|celular']
		);

		$this->assertEquals(
			$expected,
			$validator->messages()->first('campo_celular')
		);
	}
}

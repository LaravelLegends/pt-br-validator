<?php


class TestRules extends Orchestra\Testbench\TestCase
{   
    public function testCelular()
    {
        $validator = \Validator::make([
            'valido' => '99999-5555'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Celular]
        ]);


        $this->assertTrue($validator->passes());
    }

    public function testCpf()
    {
        $validator = \Validator::make([
            'valido' => '98136622809'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Cpf]
        ]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make([
            'invalido' => '08136622809'
        ], [
            'invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Cpf]
        ]);

        $this->assertTrue($validator->fails());
    }
}
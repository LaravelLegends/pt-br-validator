<?php

use PHPLegends\PtBrValidator\Validator;

class TestValidator extends TestCase
{
    public function testTelefoneComDdd()
    {
        
        $correct = \Validator::make(
            ['certo' => '(99)3500-4444'],
            ['certo' => 'telefone-com-ddd']
        );

        $incorrect = \Validator::make(
            ['errado' => '(99)9-1926'],
            ['errado' => 'telefone-com-ddd']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails());

    }

    public function testCelularComDdd()
    {
        $correct = \Validator::make(
            ['certo' => '(99)98899-4444'],
            ['certo' => 'celular-com-ddd']
        );

        $incorrect = \Validator::make(
            ['errado' => '(99)9800-1926'],
            ['errado' => 'celular-com-ddd']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails());
    }


    public function testCelular()
    {
        $correct = \Validator::make(
            ['certo' => '98899-4444'],
            ['certo' => 'celular']
        );

        $incorrect = \Validator::make(
            ['errado' => '9800-1926'],
            ['errado' => 'celular']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails());
    }

    public function testTelefone()
    {
        $correct = \Validator::make(
            ['certo' => '3598-4550'],
            ['certo' => 'telefone']
        );

        $incorrect = \Validator::make(
            ['errado' => '99800-1926'],
            ['errado' => 'telefone']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails());
    }


    public function testCpf()
    {
        $correct = \Validator::make(
            ['certo' => '094.050.986-59'],
            ['certo' => 'cpf']
        );

        $incorrect = \Validator::make(
            ['errado' => '99800-1926'],
            ['errado' => 'cpf']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails()); 
    }

    public function testCpfFormato()
    {
        $correct = \Validator::make(
            ['certo' => '094.050.986-59'],
            ['certo' => 'formato-cpf']
        );

        $incorrect = \Validator::make(
            ['errado' => '094.050.986-591'],
            ['errado' => 'formato-cpf']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails()); 
    }


    public function testCnpj()
    {
        $correct = \Validator::make(
            ['certo' => '53.084.587/0001-20'],
            ['certo' => 'cnpj']
        );

        $incorrect = \Validator::make(
            ['errado' => '51.084.587/0001-20'],
            ['errado' => 'cnpj']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails()); 
    }


    public function testCnpjFormato()
    {
        $correct = \Validator::make(
            ['certo' => '53.084.587/0001-20'],
            ['certo' => 'formato-cnpj']
        );

        $incorrect = \Validator::make(
            ['errado' => '51.084.587/000120'],
            ['errado' => 'formato-cnpj']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails()); 
    }

    public function testCnh()
    {
        $correct = \Validator::make(
            ['certo' => '96784547943'],
            ['certo' => 'cnh']
        );

        $incorrect = \Validator::make(
            ['errado' => '96784547999'],
            ['errado' => 'cnh']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails()); 
    }

}
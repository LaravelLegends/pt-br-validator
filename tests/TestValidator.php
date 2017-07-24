<?php

use LaravelLegends\PtBrValidator\Validator;

class TestValidator extends Orchestra\Testbench\TestCase
{

    protected function getPackageProviders($app)
    {
        return ['LaravelLegends\PtBrValidator\ValidatorProvider'];
    }
    
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
            ['errado' => '(99)800-1926'],
            ['errado' => 'celular-com-ddd']
        );

        $this->assertTrue($correct->passes());

        $this->assertTrue($incorrect->fails());
    }


    public function testCelular()
    {
        $correct = \Validator::make(
            ['certo' => '98899-4444', 'outro_certo' => '9800-1936'],
            ['certo' => 'celular', 'outro_certo' => 'celular']
        );

        $incorrect = \Validator::make(
            ['errado' => '900-1926'],
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


        // Correção do ISSUE: https://github.com/LaravelLegends/pt-br-validator/issues/4

        $repeats = [
            '00.000.000/0000-00',
            '11111111111111',
            '22222222222222',
            '00.000.000/0000-00',
            '11.111.111/1111-11',
            '22.222.222/2222-22',
        ];

        foreach ($repeats as $cnpj)
        {

            $validator = \Validator::make(['cnpj' => $cnpj], [
                'cnpj' => 'required|cnpj'
            ]);

            $this->assertFalse($validator->passes(), "O CNPJ $cnpj foi marcado como verdadeiro, quando na verdade é FALSO");
        }
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

    public function testDate()
    {

        $datasValidas = [
            '01/01/2001',
            '12/01/2004',

            '31/11/2005',

            '12/02/2122',

            //'14/13/2022',// falhou

            //'32/11/2000',// falhou

            //'00/11/2001', // falhou


            // Alguém tem alguma ideia para melhorar isso (0001)?

            '20/11/0001',

            '01/11/2001',

            '30/11/2001',

            '17/11/2000',
        ];


        foreach($datasValidas as $data)
        {
            $correct = \Validator::make(
                ['certo' => $data],
                ['certo' => 'data']
            );

            $this->assertTrue($correct->passes(), "Data {$data} incorreta");
        }

    }


    public function testFormatoCep()
    {
        
        $cepsValidos = [
            '32400-000',
            '32.400-000',
            '07.550-000',
            '30.150-150'
        ];


        foreach ($cepsValidos as $cep) {

            $correct = \Validator::make(['cep' => $cep], ['cep' => 'formato_cep']);

            $this->assertTrue($correct->passes());
        }

        $cepsInvalidos = [
            '32400.000',
            '32.400-0000',
            '0.400-000',
            '300.40-000',
            '300.400-000'
        ];


        foreach ($cepsInvalidos as $cep) {
            
            $correct = \Validator::make(['cep' => $cep], ['cep' => 'formato_cep']);

            $this->assertTrue($correct->fails());
        }
    }

    public function testFormatoPlacaDeVeiculo()
    {
        $placasValidas = [
            'ABC-1234',
            'abc-1234',
            'ABC1234',
            'aBc1234', 
            'abc1234'
        ];

        foreach ($placasValidas as $placa) {
            
            $correct = \Validator::make(
                ['placa' => $placa], 
                ['placa' => 'formato_placa_de_veiculo']
            );

            $this->assertTrue($correct->passes());
        }

        $placasInvalidas = [
            'a2c-1234',
            'abc-12ed',
            'abc 1234',
            'ãBC1234',
            'ABCD1234',
            'ABC12345',
            'ab1234',
            'ab123a4',
            'abc+1234'
        ];

        foreach ($placasInvalidas as $placa) {
            
            $incorrect = \Validator::make(
                ['placa' => $placa], 
                ['placa' => 'formato_placa_de_veiculo']
            );

            $this->assertTrue($incorrect->fails());
        }
    }

}

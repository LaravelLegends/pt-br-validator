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

    public function testTelefoneComCodigo()
    {
        $correct = \Validator::make(
            ['certo' => '+55(99)3500-4444'],
            ['certo' => 'telefone-com-codigo']
        );

        $incorrect = \Validator::make(
            ['errado' => '+5(99)9-1926'],
            ['errado' => 'telefone-com-codigo']
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

    public function testCelularComCodigo()
    {
        $correct = \Validator::make(
            ['certo' => '+55(99)98899-4444'],
            ['certo' => 'celular-com-codigo']
        );

        $incorrect = \Validator::make(
            ['errado' => '+5(99)800-1926'],
            ['errado' => 'celular-com-codigo']
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

        foreach ($repeats as $cnpj) {
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
            'abc1234',

            // placas mercosul
            'BEE4R22',
            'FUM-0B05',
            'FUM-5L58',
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



    public function testFormatoPis()
    {
        $validator = \Validator::make(['valido' => '276.96730.83-0'], [ 'valido' => 'formato_pis' ]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make(['valido' => '276.96730.830'], [ 'valido' => 'formato_pis' ]);

        $this->assertTrue($validator->fails());
    }


    public function testPis()
    {
        foreach (['690.30244.88-6', '042.33768.05-2', '971.78508.77-5'] as $pis) {
            $validator = \Validator::make(['valido' => $pis], [ 'valido' => 'pis']);
    
            $this->assertTrue($validator->passes());
        }


        $validator = \Validator::make(['valido' => '290.30244.88-5'], [ 'valido' => 'pis' ]);

        $this->assertTrue($validator->fails());
    }

    public function testCpfOuCnpj()
    {
        foreach (['981.366.228-09', '56.611.605/0001-73', '49851807000127'] as $valor) {
            $validator = \Validator::make(
                ['valido' => $valor],
                ['valido' => 'cpf_ou_cnpj']
            );

            $this->assertTrue($validator->passes());
        }

        foreach (['000.366.228-09', '11.611.605/0001-73', '22851807000127'] as $valor) {
            $validator = \Validator::make(
                ['invalido' => $valor],
                ['invalido' => 'cpf_ou_cnpj']
            );

            $this->assertTrue($validator->fails());
        }
    }


    public function testFormatoCpfOuCnpj()
    {
        foreach (['981.366.228-09', '000.000.000-00', '56.611.605/0001-73'] as $valor) {
            $validator = \Validator::make(
                ['valido' => $valor],
                ['valido' => 'formato_cpf_ou_cnpj']
            );

            $this->assertTrue($validator->passes());
        }

        foreach (['0000.366.228-09', '11.6211.605/0001-73', '22851807000127'] as $valor) {
            $validator = \Validator::make(
                ['invalido' => $valor],
                ['invalido' => 'formato_cpf_ou_cnpj']
            );

            $this->assertTrue($validator->fails());
        }
    }

    public function testUf()
    {
        $testes = [
            'AC' => true,
            'AL' => true,
            'AP' => true,
            'AM' => true,
            'BA' => true,
            'CE' => true,
            'DF' => true,
            'ES' => true,
            'GO' => true,
            'MA' => true,
            'MS' => true,
            'MT' => true,
            'MG' => true,
            'PA' => true,
            'PB' => true,
            'PR' => true,
            'PE' => true,
            'PI' => true,
            'RJ' => true,
            'RN' => true,
            'RS' => true,
            'RO' => true,
            'RR' => true,
            'SC' => true,
            'SP' => true,
            'SE' => true,
            'TO' => true,

            'FALSE' => false,
            'mg' => false,
            'sp' => false,
            'MO' => false,
            'CB' => false,
        ];

        foreach ($testes as $valor => $boolean) {
            $validator = \Validator::make(
                ['valido' => $valor],
                ['valido' => 'uf']
            );

            $this->assertTrue($boolean ? $validator->passes() : $validator->fails());
        }
    }
}

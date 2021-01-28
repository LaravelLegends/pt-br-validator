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
    
    public function testCelularComDdd()
    {
        $validator = \Validator::make([
            'valido' => '(31)99999-5555'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\CelularComDdd]
        ]);


        $this->assertTrue($validator->passes());
    }


    public function testCelularComCodigo()
    {
        $validator = \Validator::make([
            'valido' => '+1(31)99999-5555'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\CelularComCodigo]
        ]);


        $this->assertTrue($validator->passes());
    }

    public function testTelefone()
    {
        $validator = \Validator::make([
            'valido' => '9999-5555'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Telefone]
        ]);


        $this->assertTrue($validator->passes());
    }



    public function testTelefoneComDdd()
    {
        $validator = \Validator::make([
            'valido' => '(31)9999-5555'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\TelefoneComDdd]
        ]);


        $this->assertTrue($validator->passes());
    }





    public function testTelefoneComCodigo()
    {
        $validator = \Validator::make([
            'valido' => '+66(31)9999-5555'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\TelefoneComCodigo]
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


    public function testFormatoCpf()
    {
        $validator = \Validator::make([
            'valido' => '981.366.228-09'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCpf]
        ]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make([
            'invalido' => '08136622809'
        ], [
            'invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCpf]
        ]);

        $this->assertTrue($validator->fails());
    }



    public function testCnpj()
    {
        $validator = \Validator::make([
            'valido' => '16.651.801/0001-57'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Cnpj]
        ]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make([
            'invalido' => '16.651.801/0001-52'
        ], [
            'invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Cnpj]
        ]);

        $this->assertTrue($validator->fails());
    }



    public function testFormatoCnpj()
    {
        $validator = \Validator::make([
            'valido' => '16.651.801/0001-57'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCnpj]
        ]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make([
            'invalido' => '16.651.801/000152'
        ], [
            'invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCnpj]
        ]);

        $this->assertTrue($validator->fails());
    }


    public function testFormatoPlacaDeVeiculo()
    {
        $validator = \Validator::make([
            'valido' => 'BEE4R22'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoPlacaDeVeiculo]
        ]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make([
            'invalido' => 'XXXBEE4R22'
        ], [
            'invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoPlacaDeVeiculo]
        ]);

        $this->assertTrue($validator->fails());
    }



    public function testCnh()
    {
        $validator = \Validator::make([
            'valido' => '96784547943'
        ], [
            'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Cnh]
        ]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make([
            'invalido' => '96784547999'
        ], [
            'invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Cnh]
        ]);

        $this->assertTrue($validator->fails());
    }

    public function testFormatoPis()
    {
        $validator = \Validator::make(['valido' => '276.96730.83-0'], [ 'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoPis]]);

        $this->assertTrue($validator->passes());

        $validator = \Validator::make(['valido' => '276.96730.830'], [ 'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoPis]]);

        $this->assertTrue($validator->fails());
    }


    public function testPis()
    {

        foreach (['690.30244.88-6', '042.33768.05-2', '971.78508.77-5'] as $pis) {

            $validator = \Validator::make(['valido' => $pis], [ 'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Pis]]);
    
            $this->assertTrue($validator->passes());
        }


        $validator = \Validator::make(['valido' => '290.30244.88-5'], [ 'valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\Pis]]);

        $this->assertTrue($validator->fails());
    }  


    public function testCpfOuCnpj()
    {


        foreach (['981.366.228-09', '56.611.605/0001-73', '49851807000127'] as $valor) {

            $validator = \Validator::make(
                ['valido' => $valor], 
                ['valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\CpfOuCnpj]]
            );

            $this->assertTrue($validator->passes());
        }

        foreach (['000.366.228-09', '11.611.605/0001-73', '22851807000127'] as $valor) {

            $validator = \Validator::make(
                ['invalido' => $valor], 
                ['invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\CpfOuCnpj]]
            );

            $this->assertTrue($validator->fails());
        }
    }


    public function testFormatoCpfOuCnpj()
    {


        foreach (['981.366.228-09', '000.000.000-00', '56.611.605/0001-73'] as $valor) {

            $validator = \Validator::make(
                ['valido' => $valor], 
                ['valido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCpfOuCnpj]]
            );

            $this->assertTrue($validator->passes());
        }

        foreach (['0000.366.228-09', '11.6211.605/0001-73', '22851807000127'] as $valor) {

            $validator = \Validator::make(
                ['invalido' => $valor], 
                ['invalido' => ['required', new \LaravelLegends\PtBrValidator\Rules\FormatoCpfOuCnpj]]
            );

            $this->assertTrue($validator->fails());
        }
    }






}
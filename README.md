# pt-br-validator: Validações brasileiras para Laravel.

Esta biblioteca adiciona validações brasileira ao Laravel, como CPF, CNPJ, Placa de Carro, CEP, Telefone, Celular e afins.

:brazil::brazil::brazil:

[![Build Status](https://travis-ci.org/LaravelLegends/pt-br-validator.svg?branch=master)](https://travis-ci.org/LaravelLegends/pt-br-validator)

## Versões

<table>
    <tr>    
        <th>Laravel</th>
        <th>Biblioteca</th>
    </tr>
    <tr>
        <td>4.*</td>
        <td>4.*</td>
    </tr>
    <tr>
        <td>5.*</td>
        <td>5.1.*</td>
    </tr>
    <tr>
        <td>^6.0 || ^7.0 || ^8.0</td>
        <td>^8.0</td>
    </tr>
</table>

## Instalação

Navegue até a pasta do seu projeto, por exemplo:

```
cd /etc/www/projeto
```

E então execute:

```
composer require laravellegends/pt-br-validator
```

Agora, para utilizar a validação, basta fazer o procedimento padrão do `Laravel`.

A diferença é que será possível usar os seguintes métodos de validação:

|           REGRA          |                                                                       Descrição                                                                       |
|:-------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------:|
| Celular                  | Valida se o campo está no formato (**`99999-9999`** ou **`9999-9999`**)                                                                               |
| celular_com_ddd          | Valida se o campo está no formato (**`(99)99999-9999`** ou **`(99)9999-9999`** ou **`(99) 99999-9999`** ou **`(99) 9999-9999`**)                      |
| celular_com_codigo       | Valida se o campo está no formato `+99(99)99999-9999` ou +99(99)9999-9999.                                                                            |
| cnpj                     | Valida se o campo é um CNPJ válido. É possível gerar um CNPJ válido para seus testes utilizando o site [geradorcnpj.com](http://www.geradorcnpj.com/) |
| cpf                      | Valida se o campo é um CPF válido. É possível gerar um CPF válido para seus testes utilizando o site [geradordecpf.org](http://geradordecpf.org)      |
| formato_cnpj             | Valida se o campo tem uma máscara de CNPJ correta (**`99.999.999/9999-99`**).                                                                         |
| formato_cpf              | Valida se o campo tem uma máscara de CPF correta (**`999.999.999-99`**).                                                                              |
| formato_cep              | Valida se o campo tem uma máscara de correta (**`99999-999`** ou **`99.999-999`**).                                                                   |
| telefone                 | Valida se o campo tem umas máscara de telefone (**`9999-9999`**).                                                                                     |
| telefone_com_ddd         | Valida se o campo tem umas máscara de telefone com DDD (**`(99)9999-9999`**).                                                                         |
| telefone_com_codigo      | Valida se o campo tem umas máscara de telefone com DDD (**`+55(99)9999-9999`**).                                                                      |
| formato_placa_de_veiculo | Valida se o campo tem o formato válido de uma placa de veículo (incluindo o padrão MERCOSUL).                                                         |
| formato_pis              | Valida se o campo tem o formato de PIS.                                                                                                               |
| pis                      | Valida se o PIS é válido.                                                                                                                             |
| cpf_ou_cnpj              | Valida se o campo é um CPF ou CNPJ                                                                                                                    |
| formato_cpf_ou_cnpj      | Valida se o campo contém um formato de CPF ou CNPJ                                                                                                    |
| uf                       | Valida se o campo contém uma sigla de Estado válido (UF)                                                                                              |

## Testando as validações do PtBrValidator

Com isso, é possível fazer um teste simples

```php

$validator = \Validator::make(
    ['telefone' => '(77)9999-3333'],
    ['telefone' => 'required|telefone_com_ddd']
);

dd($validator->fails());

```

Você pode utilizá-lo também com a instância de `Illuminate\Http\Request`, através do método `validate`.

Veja:

```php

use Illuminate\Http\Request;

// URL: /testando?telefone=3455-1222

Route::get('testando', function (Request $request) {

    try{

        $dados = $request->validate([
            'telefone' => 'required|telefone',
            // outras validações aqui
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors());
    }

});

```

### Customizando as mensagens

Todas as validações citadas acima já contam mensagens padrões de validação, porém, é possível alterar isto usando o terceiro parâmetro de `Validator::make`. Este parâmetro deve ser um array onde os índices sejam os nomes das validações e os valores devem ser as respectivas mensagens.

Por exemplo:

```php
Validator::make($valor, $regras, ['celular_com_ddd' => 'O campo :attribute não é um celular'])
```

Ou através do método `messages` do seu Request criado pelo comando `php artisan make:request`.

```php
public function messages() {

    return [
        'campo.telefone' => 'Telefone não válido!'
    ];
}
```

### Acessando as Regras separadamente

Caso tenha necessidade de acessar alguma regra separadamente, você poderá ter acesso as seguintes classes:

```
\LaravelLegends\PtBrValidator\Rules\Celular::class
\LaravelLegends\PtBrValidator\Rules\CelularComDdd::class
\LaravelLegends\PtBrValidator\Rules\CelularComCodigo::class
\LaravelLegends\PtBrValidator\Rules\Cnh::class
\LaravelLegends\PtBrValidator\Rules\Cnpj::class
\LaravelLegends\PtBrValidator\Rules\Cpf::class
\LaravelLegends\PtBrValidator\Rules\FormatoCnpj::class
\LaravelLegends\PtBrValidator\Rules\FormatoCpf::class
\LaravelLegends\PtBrValidator\Rules\Telefone::class
\LaravelLegends\PtBrValidator\Rules\TelefoneComDdd::class
\LaravelLegends\PtBrValidator\Rules\TelefoneComCodigo::class
\LaravelLegends\PtBrValidator\Rules\FormatoCep::class
\LaravelLegends\PtBrValidator\Rules\FormatoPlacaDeVeiculo::class
\LaravelLegends\PtBrValidator\Rules\FormatoPis::class
\LaravelLegends\PtBrValidator\Rules\Pis::class
\LaravelLegends\PtBrValidator\Rules\CpfOuCnpj::class
\LaravelLegends\PtBrValidator\Rules\FormatoCpfOuCnpj::class
\LaravelLegends\PtBrValidator\Rules\Uf::class
```

Por exemplo, se você deseja validar o formato do campo de um CPF, você pode utilizar a classe `LaravelLegends\PtBrValidator\Rules\FormatoCpf` da seguinte forma:

```php
use Illuminate\Http\Request;
use LaravelLegends\PtBrValidator\Rules\FormatoCpf;

// testando?cpf=valor_invalido

Route::get('testando', function (Request $request) {

    try{

        $dados = $request->validate([
            'cpf'  => ['required', new FormatoCpf]
            // outras validações aqui
        ]);

    } catch (\Illuminate\Validation\ValidationException $e) {
        dd($e->errors());
    }

});
```

## Changelog

- 8.0.3 - Validação `uf` adicionada.
- 8.0.2 - Validação `cpf_ou_cnpj`
- 5.2.1 - Validação `cpf_ou_cnpj`

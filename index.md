# Laravel 6+ - Validações em Português

Esta é uma biblioteca com algumas validações brasileiras.

[![Build Status](https://travis-ci.org/LaravelLegends/pt-br-validator.svg?branch=master)](https://travis-ci.org/LaravelLegends/pt-br-validator)

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

* **`celular`** - Valida se o campo está no formato (**`99999-9999`** ou **`9999-9999`**)

*  **`celular_com_ddd`** - Valida se o campo está no formato (**`(99)99999-9999`** ou **`(99)9999-9999`** ou **`(99) 99999-9999`** ou **`(99) 9999-9999`**)
* **`celular_com_codigo`** - Valida se o campo está no formato `+99(99)99999-9999` ou +99(99)9999-9999.

* **`cnpj`** - Valida se o campo é um CNPJ válido. É possível gerar um CNPJ válido para seus testes utilizando o site [geradorcnpj.com](http://www.geradorcnpj.com/)

* **`cpf`** - Valida se o campo é um CPF válido. É possível gerar um CPF válido para seus testes utilizando o site [geradordecpf.org](http://geradordecpf.org) 

* <strike>**`data`** - Valida se o campo é uma data no formato `DD/MM/YYYY`. Por exemplo: `31/12/1969`.</strike> - Removido na versão 8.0 >=. Utilize opcionalmente `dateformat:d/m/Y` no Laravel.

* **`formato_cnpj`** - Valida se o campo tem uma máscara de CNPJ correta (**`99.999.999/9999-99`**).

* **`formato_cpf`** - Valida se o campo tem uma máscara de CPF correta (**`999.999.999-99`**).

* **`formato_cep`** - Valida se o campo tem uma máscara de correta (**`99999-999`** ou **`99.999-999`**).

* **`telefone`** - Valida se o campo tem umas máscara de telefone (**`9999-9999`**).

* **`telefone_com_ddd`** - Valida se o campo tem umas máscara de telefone com DDD (**`(99)9999-9999`**).
* **`telefone_com_codigo`** - Valida se o campo tem umas máscara de telefone com DDD (**`+55(99)9999-9999`**).

* **`formato_placa_de_veiculo`** - Valida se o campo tem o formato válido de uma placa de veículo (incluindo o padrão MERCOSUL).

* **`formato_pis`** - Valida se o campo tem o formato de PIS.
* **`pis`**  - Valida se o PIS é válido.

### Testando

Com isso, é possível fazer um teste simples


```php

$validator = \Validator::make(
    ['telefone' => '(77)9999-3333'],
    ['telefone' => 'required|telefone_com_ddd']
);

dd($validator->fails());

```
#Laravel 5 - Validação em Português
2
​
3
Essa é uma biblioteca com algumas validações brasileiras.
4
​
5
​
6
#Instalação
7
​
8
No arquivo `composer.json`, adicione:
9
​
10
```json
11
{
12
        "phplegends/pt-br-validator" : "2.*"
13
}
14
```
15
​
16
Rode o comando `composer update --no-scripts`.
17
​
18
Após a instalação, adicione no arquivo `config/app.php` a seguinte linha:
19
​
20
```php
21
​
22
PHPLegends\PtBrValidator\ValidatorProvider::class
23
​
24
```
25
​
26
Para utilizar a validação agora, basta fazer o procedimento padrão do `Laravel`.
27
​
28
A diferença é que agora, você terá os seguintes métodos de validação:
29
​
30
* celular - Valida um celular através do formato 99999-9999 ou 9999-9999
31
​
32
* celular_com_ddd -  Valida um celular através do formato (99)99999-9999 ou (99)9999-9999
33
​
34
* cnpj - Valida se o CNPJ é valido. Para testar, basta utilizar o site http://www.geradorcnpj.com/
35
​
36
* cpf - Valida se o cpf é valido. Para testar, basta utilizar o site http://geradordecpf.
37
org
38
​
39
* data - Valida se a data está no formato 31/12/1969
40
​
41
* formato_cnpj - Valida se a mascará do CNPJ é válida
42
​
43
* formato_cpf - Valida se a mascará do cpf está certo. 999.999.999-99
44
​
45
* telefone - Valida um telefone através do formato 9999-9999
46
​
47
* telefone_com_ddd - Valida um telefone através do formato (99)9999-9999
48
​
49
​
50
Então, podemos usar um simples teste:
51
​
52
​
53
```php
54
$validator = Validator::make(
55
        ['telefone' => '(77)9999-3333'],
56
        ['telefone' => 'required|telefone_com_ddd']
57
);
58
​
59
dd($validator->fails());
60
​
61
```
62
​
63
​
64
Já existe nessa biblioteca algumas mensagens padrão para as validações de cada um dos items citados acima. 
65
​
66
Para modificar isso, basta adicionar ao terceiro parâmetro de `Validator::make` um array, contendo o índice com o nome da validação e o valor com a mensagem desejada.
67
​
68
​
69
Exemplo:
70
​
71
​
72
```php
73
Validator::make($valor, $regras, ['celular_com_ddd' => 'O campo :attribute não é um celular'])
74
```
75
​
76

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

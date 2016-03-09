#Laravel 4 - Validação em Português

Essa é uma biblioteca com algumas validações brasileiras.


#Instalação

No arquivo `composer.json`, adicione:

```json
{
	"phplegends/pt-br-validator" : "dev-master"
}
```

Rode o comando `composer update --no-scripts`.

Após a instalação, adicione no arquivo `app.php` a seguinte linha:

```php
'PHPLegends\PtBrValidator\ValidatorProvider'
```



Para utilizar a validação agora, basta fazer o procedimento padrão do `Laravel`.

A diferença é que agora, você terá os seguintes métodos de validação:


* telefone - Valida um telefone através do formato 9999-9999

* celular - Valida um celular através do formato 99999-9999

* celular-com-ddd -  Valida um celular através do formato (99)99999-9999

* telefone-com-ddd - Valida um telefone através do formato (99)9999-9999

* telefone-com-ddd - Valida um telefone através do formato (99)9999-9999

* format-cpf - Valida se a mascará do cpf está certo. 999.999.999-99

* cpf - Valida se o cpf é valido. Para testar, basta utilizar o site http://geradordecpf.org

* formato-cnpj - Valida se a mascará do CNPJ é válida 

* cnpj - Valida se o CNPJ é valido. Para testar, basta utilizar o site 


Então, podemos usar um simples teste:


```php
$validator = Validator::make(
	['telefone' => '(77)9999-3333'],
	['telefone' => 'required|telefone-com-ddd']
);

dd($validator->fails());

```
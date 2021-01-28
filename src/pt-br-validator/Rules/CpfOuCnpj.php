<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

class CpfOuCnpj implements Rule
{
	public function passes($attribute, $value)
	{

		return (new Cpf)->passes($attribute, $value) || (new Cnpj)->passes($attribute, $value);
	}

	public function message()
    {
    	return 'O campo :attribute não é um CPF ou CNPJ válido.';
    }
}
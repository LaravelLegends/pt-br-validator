<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class CpfOuCnpj implements Rule
{
	/**
	 * Valida se o campo é um CPF ou um CNPJ válido
	 *
	 * @param string $attribute
     * @param string $value
     * @return boolean
	*/
	public function passes($attribute, $value)
	{

		return (new Cpf)->passes($attribute, $value) || (new Cnpj)->passes($attribute, $value);
	}

	public function message()
    {
    	return 'O campo :attribute não é um CPF ou CNPJ válido.';
    }
}
<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use LaravelLegends\PtBrValidator\Rules\Concerns\HasValidationRule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class TelefoneComDdd implements ValidationRule
{
    use HasValidationRule;

    /**
     * Valida o formato do telefone junto com o ddd
     * 
     * @param string $attribute
     * @param string $value
     * @return boolean
    */

    public function passes($attribute, $value)
    {
        return preg_match('/^\(\d{2}\)\s?\d{4}-\d{4}$/', $value) > 0;
    }


    public function message()
    {
    	return 'O campo :attribute não é um telefone com DDD válido.';
    }
}
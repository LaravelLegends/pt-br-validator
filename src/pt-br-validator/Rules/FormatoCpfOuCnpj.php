<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use LaravelLegends\PtBrValidator\Rules\Concerns\HasValidationRule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
*/
class FormatoCpfOuCnpj implements ValidationRule
{

    use HasValidationRule;

    
    /**
     * Valida o formato de CPF ou CNPJ
     * 
     * @param string $attribute
     * @param string $value
     * @return boolean
    */
    public function passes($attribute, $value)
    {
        return (new FormatoCpf)->passes($attribute, $value) || (new FormatoCnpj)->passes($attribute, $value);
    }

    public function message()
    {
        return 'O campo :attribute não possui o formato válido de CPF ou CNPJ.';
    }
}
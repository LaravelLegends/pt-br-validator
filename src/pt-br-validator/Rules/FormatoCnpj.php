<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\ValidationRule;
use LaravelLegends\PtBrValidator\Rules\Concerns\HasValidationRule;

/**
* @author Wallace Maxters <wallacemaxters@gmail.com>
*/
class FormatoCnpj implements ValidationRule
{
    use HasValidationRule;
    
    /**
     * 
     * Valida o formato do cnpj
     * 
     * @param string $attribute
     * @param string $value
     * @return boolean
    */
    public function passes($attribute, $value)
    {
        return preg_match('/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/', $value) > 0;
    }

    public function message()
    {
        return 'O campo :attribute não possui o formato válido de CNPJ.';
    }
}
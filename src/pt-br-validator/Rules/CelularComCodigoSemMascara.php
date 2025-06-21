<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use LaravelLegends\PtBrValidator\Rules\Concerns\HasValidationRule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
*/
class CelularComCodigoSemMascara implements ValidationRule
{
    use HasValidationRule;

    
    /**
     * Valida o formato do celular com código do país
     * 
     * @param string $attribute
     * @param string $value
     * @return boolean
    */
    public function passes($attribute, $value)
    {
        return preg_match('/^[+]\d{1,2}\s?\d{2}\s?\d{4,5}\d{4}$/', $value) > 0;
    }

    public function message()
    {
    	return 'O campo :attribute não é um celular válido. Exemplo de celular válido +5514999999999';
    }
}
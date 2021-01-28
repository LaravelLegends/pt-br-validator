<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class TelefoneComCodigo implements Rule
{

    
    /**
     * Valida o formato do telefone com código do país
     * 
     * @param string $attribute
     * @param string $value
     * @return boolean
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[+]\d{1,2}\s?\(\d{2}\)\s?\d{4,5}\-\d{4}$/', $value) > 0;
    }


    public function message()
    {
    	return 'O campo :attribute não é um telefone com código e DDD válido.';
    }
}
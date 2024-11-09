<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
* @author Wallace Maxters <wallacemaxters@gmail.com>
*/
class FormatoCnpj implements Rule
{

    
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
        return preg_match('/^[0-9A-Z]{2}\.[0-9A-Z]{3}\.[0-9A-Z]{3}\/[0-9A-Z]{4}-\d{2}$/', $value) > 0;
    }

    public function message()
    {
        return 'O campo :attribute não possui o formato válido de CNPJ.';
    }
}
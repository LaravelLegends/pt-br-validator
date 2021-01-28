<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Celular implements Rule
{

    /**
     * Valida o formato do celular
     * @param string $attribute
     * @param string $value
     * @return boolean
    */
    public function passes($attribute, $value)
    {
        return preg_match('/^\d{4,5}-\d{4}$/', $value) > 0;
    }


    public function message()
    {
    	return 'O campo :attribute não é um celular válido.';
    }
}
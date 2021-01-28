<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Validação para Formato do PIS
 * 
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class FormatoPis implements Rule
{

    /**
     * Valida o formato do Número do PIS
     * 
     * @param string $attribute
     * @param string $value
     * @return boolean
    */
    public function passes($attribute, $value)
    {
        return preg_match('/^\d{3}\.\d{5}\.\d{2}-\d{1}$/', $value) > 0;
    }

    public function message()
    {
    	return 'O campo :attribute não é um PIS com formato válido.';
    }
}
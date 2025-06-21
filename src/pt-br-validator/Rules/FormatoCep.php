<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use LaravelLegends\PtBrValidator\Rules\Concerns\HasValidationRule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class FormatoCep implements ValidationRule
{
    use HasValidationRule;

    /**
     * Valida se o formato de CEP está correto
     *
     * @param string $attribute
     * @param string $value
     * @return boolean
    */

    public function passes($attribute, $value)
    {
        return preg_match('/^\d{2}\.?\d{3}-\d{3}$/', $value) > 0;
    }

    public function message()
    {
    	return 'O campo :attribute não possui um formato válido de CEP.';
    }
}
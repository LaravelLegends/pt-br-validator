<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use LaravelLegends\PtBrValidator\Rules\Concerns\HasValidationRule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Celular implements ValidationRule
{
    use HasValidationRule;

    public function passes($attribute, $value)
    {
        return preg_match('/^\d{4,5}-\d{4}$/', $value) > 0;
    }

    public function message()
    {
    	return 'O campo :attribute não é um celular válido.';
    }
}
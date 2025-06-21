<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use LaravelLegends\PtBrValidator\Rules\Concerns\HasValidationRule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class FormatoCpf implements ValidationRule
{
    use HasValidationRule;

    /**
     * Valida o formato do cpf
     * 
     * @param string $attribute
     * @param string $value
     * @return boolean
    */
    public function passes($attribute, $value)
    {
        return preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $value) > 0;
    }

    public function message()
    {
        return 'O campo :attribute não possui o formato válido de CPF.';
    }
}
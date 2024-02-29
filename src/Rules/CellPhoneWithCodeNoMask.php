<?php

namespace ValidatorDocs\Rules;

use Illuminate\Contracts\Validation\Rule;

class CellPhoneWithCodeNoMask implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^[+]\d{1,2}\s?\d{2}\s?\d{4,5}\d{4}$/', $value) > 0;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'O campo :attribute não é um celular válido. Exemplo de celular válido +5514999999999';
    }
}

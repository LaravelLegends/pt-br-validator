<?php

namespace ValidatorDocs\Rules;

use Illuminate\Contracts\Validation\Rule;

class FormatCEP implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {
        return preg_match('/^\d{2}\.?\d{3}-\d{3}$/', $value) > 0;
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'O campo :attribute não possui um formato válido de CEP.';
    }
}

<?php

namespace ValidatorDocs\Rules;

use Illuminate\Contracts\Validation\Rule;

class FormatCPForCNPJ implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {
        return (new FormatoCpf)->passes($attribute, $value) || (new FormatoCnpj)->passes($attribute, $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'O campo :attribute não possui o formato válido de CPF ou CNPJ.';
    }
}

<?php

namespace ValidatorDocs\Rules;

use Illuminate\Contracts\Validation\Rule;

class CPForCNPJ implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {

        return (new Cpf)->passes($attribute, $value) || (new Cnpj)->passes($attribute, $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'O campo :attribute não é um CPF ou CNPJ válido.';
    }
}

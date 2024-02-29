<?php

namespace PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;
use PtBrValidator\Support\Helpers;

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
        return Helpers::getMessage('cpf_or_cnpj');
    }
}

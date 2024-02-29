<?php

namespace PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;
use PtBrValidator\Support\Helpers;

class FormatCPForCNPJ implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {
        return (new FormatCPF)->passes($attribute, $value) || (new FormatCNPJ)->passes($attribute, $value);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return Helpers::getMessage('format_cpf_or_cnpj');
    }
}

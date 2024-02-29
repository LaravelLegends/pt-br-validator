<?php

namespace ValidatorDocs\Rules;

use Illuminate\Contracts\Validation\Rule;

class CNPJ implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {
        $c = preg_replace('/\D/', '', $value);

        $b = [6, 5, 4, 3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        if (strlen($c) != 14) {
            return false;

        }

        // Remove sequências repetidas como "111111111111"
        // https://github.com/LaravelLegends/pt-br-validator/issues/4

        elseif (preg_match("/^{$c[0]}{14}$/", $c) > 0) {

            return false;
        }

        for ($i = 0, $n = 0; $i < 12; $n += $c[$i] * $b[++$i]);

        if ($c[12] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($i = 0, $n = 0; $i <= 12; $n += $c[$i] * $b[$i++]);

        if ($c[13] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;

    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'O campo :attribute não é um CNPJ válido.';
    }
}

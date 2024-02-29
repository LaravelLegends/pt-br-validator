<?php

namespace ValidatorDocs\Rules;

use Illuminate\Contracts\Validation\Rule;

class PIS implements Rule
{
    /**
     * Determine if the validation rule passes.
     */
    public function passes($attribute, $value): bool
    {
        $digits = (string) preg_replace('/\D/', '', (string) $value);

        if (mb_strlen($digits) != 11 || preg_match('/^'.$digits[0].'{11}$/', $digits)) {
            return false;
        }

        $multipliers = [3, 2, 9, 8, 7, 6, 5, 4, 3, 2];

        $sum = 0;

        for ($position = 0; $position < 10; $position++) {
            $sum += (int) $digits[$position] * $multipliers[$position];
        }

        $mod = $sum % 11;

        return (int) $digits[10] === ($mod < 2 ? 0 : 11 - $mod);
    }

    /**
     * Get the validation error message.
     */
    public function message(): string
    {
        return 'O campo :attribute não é um PIS válido.';
    }
}

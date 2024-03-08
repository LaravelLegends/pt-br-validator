<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Maycon Paiva <mayconpaivac@gmail.com>
 */
class TelefoneComCodigoSemMascara implements Rule
{


    /**
     * Valida o formato do telefone com código do país sem máscara
     * 
     * @param string $attribute
     * @param string $value
     * @return boolean
     */
    public function passes($attribute, $value)
    {
        return preg_match('/^[+]\d{1,2}\d[1-9][1-9]\d{4}\d{4}$/', $value) > 0;
    }

    public function message()
    {
        return 'O campo :attribute não é um telefone válido. Exemplo de telefone válido +551499999999';
    }
}
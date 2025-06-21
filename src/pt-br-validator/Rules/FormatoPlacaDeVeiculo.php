<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\ValidationRule;
use LaravelLegends\PtBrValidator\Rules\Concerns\HasValidationRule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
*/
class FormatoPlacaDeVeiculo implements ValidationRule
{
    use HasValidationRule;
    

    /**
     * Valida se o formato de placa de veículo está correto.
     *
     * @param string $attribute
     * @param string $value
     * @return boolean
     */

    public function passes($attribute, $value)
    {
        return preg_match('/^[a-zA-Z]{3}\-?[0-9][0-9a-zA-Z][0-9]{2}$/', $value) > 0;
    }


    public function message()
    {
    	return 'O campo :attribute não possui um formato válido de placa de veículo.';
    }
}
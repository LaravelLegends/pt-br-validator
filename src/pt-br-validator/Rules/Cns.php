<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * Classe para validar o CNS. 
 * Ideia de https://github.com/robertopc
 * 
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Cns implements Rule
{

    public function passes($attribute, $cns)
    {
        if (!isset($cns[0])) return false;

        $digit = (int) $cns[0];

        // Validamos se possui 15 caracteres ou se são 15 sequenciais repetidos

        if (strlen($cns) != 15 || preg_match("/^{$digit}{15}$/", $cns) > 0) {
            return false;
        }

        return $digit >= 7 ? $this->cnsProv($cns) : $this->cns($cns);
    }

    public function message()
    {
    	return 'O campo :attribute não é um CNS válido.';
    }

    /**
     * Valida o CNS menor que 7 no primeiro dígito
     * @param string $cns
     * @return bool 
     */

    protected function cns(string $cns)
    {
      
        $pis = substr($cns, 0, 11);

        for ($soma = 0, $i = 0, $j = 15; $i <= 10; $i++, $j--) {
            $soma += intval($pis[$i]) * $j;
        }

        $dv = 11 - ($soma % 11);

        $dv != 11 ?: $dv = 0;

        if ($dv === 10) {

            for ($soma = 2, $i = 1, $j = 15; $i <= 10; $i++, $j--) {
                $soma += intval(substr($pis, $i - 1, $i)) * $j;
            }

            $dv = 11 - ($soma % 11);

            $dv != 11 ?: $dv = 0;

            $resultado = $pis . "001" . (string) $dv;

        } else {
            $resultado = $pis . "000" . (string) $dv;
        }

        return $cns === $resultado;
    }

    /**
     * Valida o CNS que inicia por 7, 8 ou 9
     * @param string $cns
     */
    protected function cnsProv(string $cns)
    {
        if (strlen($cns) != 15) return false;

        for ($s = 0, $i = 0, $j = 15; $i < 15; $i++, $j--) {
            $s += intval($cns[$i]) * $j;
        }

        return $s % 11 === 0;
    }
}


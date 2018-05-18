<?php 

namespace LaravelLegends\PtBrValidator;

/**
* This class is part of PHPLegends package
*
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
* @author Guilherme Nascimento 
*/

class GenericPtBrValidators
{
    /**
    * Valida o formato do celular junto com o ddd
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    public static function validateCelularComDdd($value)
    {
        return preg_match('/^\(\d{2}\)\s?\d{4,5}-\d{4}$/', $value) > 0;
    }
 
    /**
    * Valida o formato do telefone junto com o ddd
    * @param string $attribute
    * @param string $value
    * @return boolean
    */

    public static function validateTelefoneComDdd($value)
    {
        return preg_match('/^\(\d{2}\)\s?\d{4}-\d{4}$/', $value) > 0;
    }


    /**
    * Valida o formato do celular
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    public static function validateCelular($value)
    {
        return preg_match('/^\d{4,5}-\d{4}$/', $value) > 0;   
    }

    /**
    * Valida o formato do telefone
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    public static function validateTelefone($value)
    {
        return preg_match('/^\d{4}-\d{4}$/', $value) > 0;
    }

    /**
    * Valida o formato do cpf
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    public static function validateFormatoCpf($value)
    {
        return preg_match('/^\d{3}\.\d{3}\.\d{3}-\d{2}$/', $value) > 0;
    }

    /**
    * Valida o formato do cnpj
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    public static function validateFormatoCnpj($value)
    {
        return preg_match('/^\d{2}\.\d{3}\.\d{3}\/\d{4}-\d{2}$/', $value) > 0;
    }

    /**
    * Valida se o CPF é válido
    * @param string $attribute
    * @param string $value
    * @return boolean
    */

    public static function validateCpf($value)
    {
        $c = preg_replace('/\D/', '', $value);

        if (strlen($c) != 11 || preg_match("/^{$c[0]}{11}$/", $c)) {
            return false;
        }

        for ($s = 10, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);

        if ($c[9] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        for ($s = 11, $n = 0, $i = 0; $s >= 2; $n += $c[$i++] * $s--);

        if ($c[10] != ((($n %= 11) < 2) ? 0 : 11 - $n)) {
            return false;
        }

        return true;

    }

    /**
    * Valida se o CNPJ é válido
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    public static function validateCnpj($value)
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
    * Valida se o CNH é válido
    * @param string $attribute
    * @param string $value
    * @return boolean
    */

    public static function validateCnh($value)
    {
        $ret = false;
        
        if ((strlen($input = preg_replace('/[^\d]/', '', $value)) == 11)
            && (str_repeat($input[1], 11) != $input)) {
            $dsc = 0;

            for ($i = 0, $j = 9, $v = 0; $i < 9; ++$i, --$j) {

                $v += (int) $input[$i] * $j;

            }

            if (($vl1 = $v % 11) >= 10) {

                $vl1 = 0;
                $dsc = 2;

            }

            for ($i = 0, $j = 1, $v = 0; $i < 9; ++$i, ++$j) {

                $v += (int) $input[$i] * $j;
                
            }

            $vl2 = ($x = ($v % 11)) >= 10 ? 0 : $x - $dsc;

            $ret = sprintf('%d%d', $vl1, $vl2) == substr($input, -2);
        }

        return $ret;
    }


    /**
    * Valida se o data está no formato 31/12/1969
    * @param string $attribute
    * @param string $value
    * @return boolean
    */

    public static function validateData($value)
    {
        $regex = '/^(0[1-9]|[1-2][0-9]|3[01])\/(0[1-9]|1[0-2])\/\d{4}$/';

        return preg_match($regex, $value) > 0;
    }

    /**
     * Valida se o formato de CEP está correto
     *
     * @param string $attribute
     * @param string $value
     * @return boolean
    */

    public static function validateFormatoCep($value) 
    {
        return preg_match('/^\d{2}\.?\d{3}-\d{3}$/', $value) > 0;
    }

    /**
     * Valida se o formato de placa de veículo está correto.
     *
     * @param string $attribute
     * @param string $value
     * @return boolean
     */

    public static function validateFormatoPlacaDeVeiculo($value)
    {
        return preg_match('/^[a-zA-Z]{3}\-?[0-9]{4}$/', $value) > 0;
    }

}

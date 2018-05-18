<?php 

namespace LaravelLegends\PtBrValidator;

use Illuminate\Validation\Validator as BaseValidator;

/**
* This class is part of PHPLegends package
*
* @author Wallace de Souza Vizerra <wallacemaxters@gmail.com>
* @author Guilherme Nascimento 
*/

class Validator extends BaseValidator
{
    /**
    * Valida o formato do celular junto com o ddd
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    protected function validateCelularComDdd($attribute, $value)
    {
        return GenericPtBrValidators::validateCelularComDdd($value);
    }
 
    /**
    * Valida o formato do telefone junto com o ddd
    * @param string $attribute
    * @param string $value
    * @return boolean
    */

    protected function validateTelefoneComDdd($attribute, $value)
    {
        return GenericPtBrValidators::validateTelefoneComDdd($value);
    }


    /**
    * Valida o formato do celular
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    protected function validateCelular($attribute, $value)
    {
        return GenericPtBrValidators::validateCelular($value);
    }

    /**
    * Valida o formato do telefone
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    protected function validateTelefone($attribute, $value)
    {
        return GenericPtBrValidators::validateTelefone($value);
    }

    /**
    * Valida o formato do cpf
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    protected function validateFormatoCpf($attribute, $value)
    {
        return GenericPtBrValidators::validateFormatoCpf($value);
    }

    /**
    * Valida o formato do cnpj
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    protected function validateFormatoCnpj($attribute, $value)
    {
        return GenericPtBrValidators::validateFormatoCnpj($value);
    }

    /**
    * Valida se o CPF é válido
    * @param string $attribute
    * @param string $value
    * @return boolean
    */

    protected function validateCpf($attribute, $value)
    {
        return GenericPtBrValidators::validateCpf($value);
    }

    /**
    * Valida se o CNPJ é válido
    * @param string $attribute
    * @param string $value
    * @return boolean
    */
    protected function validateCnpj($attribute, $value)
    {
        return GenericPtBrValidators::validateCnpj($value);
    }

    /**
    * Valida se o CNH é válido
    * @param string $attribute
    * @param string $value
    * @return boolean
    */

    protected function validateCnh($attribute, $value)
    {
        return GenericPtBrValidators::validateCnh($value);
    }


    /**
    * Valida se o data está no formato 31/12/1969
    * @param string $attribute
    * @param string $value
    * @return boolean
    */

    public function validateData($attribute, $value)
    {
        return GenericPtBrValidators::validateData($value);
    }



    /**
     * Valida se o formato de CEP está correto
     *
     * @param string $attribute
     * @param string $value
     * @return boolean
    */

    public function validateFormatoCep($attribute, $value) 
    {
        return GenericPtBrValidators::validateFormatoCep($value);
    }

    /**
     * Valida se o formato de placa de veículo está correto.
     *
     * @param string $attribute
     * @param string $value
     * @return boolean
     */

    public function validateFormatoPlacaDeVeiculo($attribute, $value)
    {
        return GenericPtBrValidators::validateFormatoPlacaDeVeiculo($value);
    }

}

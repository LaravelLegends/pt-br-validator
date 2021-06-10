<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Wallace Maxters <wallacemaxters@gmail.com>
 */
class Uf implements Rule
{
    const ESTADOS = [
        'AC' => 'Acre',
        'AL' => 'Alagoas',
        'AP' => 'Amapá',
        'AM' => 'Amazonas',
        'BA' => 'Bahia',
        'CE' => 'Ceará',
        'DF' => 'Distrito Federal',
        'ES' => 'Espirito Santo',
        'GO' => 'Goiás',
        'MA' => 'Maranhão',
        'MS' => 'Mato Grosso do Sul',
        'MT' => 'Mato Grosso',
        'MG' => 'Minas Gerais',
        'PA' => 'Pará',
        'PB' => 'Paraíba',
        'PR' => 'Paraná',
        'PE' => 'Pernambuco',
        'PI' => 'Piauí',
        'RJ' => 'Rio de Janeiro',
        'RN' => 'Rio Grande do Norte',
        'RS' => 'Rio Grande do Sul',
        'RO' => 'Rondônia',
        'RR' => 'Roraima',
        'SC' => 'Santa Catarina',
        'SP' => 'São Paulo',
        'SE' => 'Sergipe',
        'TO' => 'Tocantins',
    ];

    /**
     * Valida se o UF é válido
     *
     * @param string $attribute
     * @param string $value
    * @return boolean
    */
    public function passes($attribute, $value)
    {
        return isset(static::ESTADOS[$value]);
    }

    /**
     *
     * @return string
     */
    public function message()
    {
        return 'O campo :attribute não é um UF válido.';
    }
}

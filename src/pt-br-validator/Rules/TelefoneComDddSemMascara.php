<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Maycon Paiva <mayconpaivac@gmail.com>
 */
class TelefoneComDddSemMascara implements Rule
{
  /**
   * Valida o formato do telefone junto com o ddd sem máscara
   *
   * @param string $attribute
   * @param string $value
   * @return boolean
   */
  public function passes($attribute, $value)
  {
    return preg_match('/^[1-9][1-9]\d{8}$/', $value) > 0;
  }

  public function message()
  {
    return 'O campo :attribute não é um telefone com DDD válido.';
  }
}
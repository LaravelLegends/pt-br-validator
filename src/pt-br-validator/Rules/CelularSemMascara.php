<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Maycon Paiva <mayconpaivac@gmail.com>
 */
class CelularSemMascara implements Rule
{
  /**
   * Valida o formato do celular sem máscara
   *
   * @param string $attribute
   * @param string $value
   * @return boolean
   */
  public function passes($attribute, $value)
  {
    return preg_match('/^\d{8,9}$/', $value) > 0;
  }

  public function message()
  {
    return 'O campo :attribute não é um celular válido.';
  }
}
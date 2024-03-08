<?php

namespace LaravelLegends\PtBrValidator\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * @author Maycon Paiva <mayconpaivac@gmail.com>
 */
class TelefoneSemMascara implements Rule
{
  /**
   * Valida o formato do telefone sem máscara
   *
   * @param string $attribute
   * @param string $value
   * @return boolean
   */
  public function passes($attribute, $value)
  {
    return preg_match('/^\d{8}$/', $value) > 0;
  }

  public function message()
  {
    return 'O campo :attribute não é um telefone válido.';
  }
}
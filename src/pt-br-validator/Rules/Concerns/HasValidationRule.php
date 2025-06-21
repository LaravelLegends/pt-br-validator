<?php
namespace LaravelLegends\PtBrValidator\Rules\Concerns;

use Closure;

trait HasValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($this->passes($attribute, $value)) return;

        $fail($this->message());
    }
}
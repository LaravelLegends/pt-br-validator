<?php

namespace PtBrValidator\Support;

use Illuminate\Support\Str;

class Macros
{
    /**
     * Register the custom macros.
     */
    public static function register(): void
    {
        Str::macro('onlyNumbers', function (mixed $value): string {
            return (string) preg_replace('/\D/', '', $value);
        });
    }
}

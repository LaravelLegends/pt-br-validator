<?php

namespace PtBrValidator\Support;

use Illuminate\Translation\Translator;

class Helpers
{
    /**
     * Get the message.
     */
    public static function getMessage(string $key): string
    {
        /** @var Translator $translator * */
        $translator = app('translator');

        if ($translator->has("docs.{$key}")) {
            return $translator->get("docs.{$key}");
        }

        if ($translator->has("validation.docs.{$key}")) {
            return $translator->get("validation.docs.{$key}");
        }

        return $translator->get("docs::docs.{$key}");
    }
}

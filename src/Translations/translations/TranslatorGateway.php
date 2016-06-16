<?php

namespace TimeAgo\Translations;

use RuntimeException;

class TranslatorGateway
{
    private static $languageClassMap  = [
        'sv' => TranslatorSwedish::class
    ];

    public function requireTranslationByLanguageCode($code)
    {
        if (!isset(self::$languageClassMap[$code])) {
            throw new RuntimeException('Could not load language class for language ' . $code);
        }
        return self::$languageClassMap[$code];
    }
}

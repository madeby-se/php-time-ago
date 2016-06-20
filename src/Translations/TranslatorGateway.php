<?php

namespace TimeAgo\Translations;

use RuntimeException;

class TranslatorGateway
{
    private static $languageClassMap  = [
        'en' => TranslatorEnglish::class,
        'sv' => TranslatorSwedish::class,
    ];

    public function requireTranslationByLanguageCode($code)
    {
        if (!isset(self::$languageClassMap[$code])) {
            throw new RuntimeException('Could not load language class for language ' . $code);
        }
        return new self::$languageClassMap[$code];
    }
}

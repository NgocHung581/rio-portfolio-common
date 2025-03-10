<?php

declare(strict_types=1);

namespace Common\App\Enums;

enum Locale: string
{
    /** @var string Locale: English */
    case English = 'en';

    /** @var string Locale: Vietnamese */
    case Vietnamese = 'vi';

    /**
     * Get the label of the locale.
     */
    public function label(): string
    {
        return match ($this) {
            self::English => __('english'),
            self::Vietnamese => __('vietnamese'),
        };
    }

    /**
     * Get an array of options.
     */
    public static function toOptions()
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[] = ['value' => $case->value, 'label' => $case->label()];
        }

        return $options;
    }
}

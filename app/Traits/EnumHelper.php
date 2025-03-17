<?php

declare(strict_types=1);

namespace Common\App\Traits;

/**
 * Helper trait for enums.
 */
trait EnumHelper
{
    /**
     * Get an array of options.
     */
    public static function toOptions(): array
    {
        return array_map(
            fn(self $case) => ['value' => $case->value, 'label' => $case->label()],
            self::cases()
        );
    }
}

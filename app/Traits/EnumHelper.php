<?php

declare(strict_types=1);

namespace Common\App\Traits;

/**
 * Helper trait for enum.
 */
trait EnumHelper
{
    /**
     * Get an array of options.
     */
    public static function toOptions(array $extraFields = []): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $option = ['value' => $case->value, 'label' => $case->label()];

            foreach ($extraFields as $key => $method) {
                if (method_exists($case, $method)) {
                    $option[is_string($key) ? $key : $method] = $case->{$method}();
                }
            }

            $options[] = $option;
        }

        return $options;
    }
}

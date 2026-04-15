<?php

declare(strict_types=1);

namespace Common\App\Traits;

/**
 * Helper trait for number.
 */
trait NumberHelper
{
    /**
     * Parse a value to integer.
     */
    public function parseInt(mixed $value): mixed
    {
        $parsedValue = filter_var($value, FILTER_VALIDATE_INT);

        if ($parsedValue === false) {
            return $value;
        }

        return $parsedValue;
    }
}

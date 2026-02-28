<?php

declare(strict_types=1);

namespace Common\App\Enums;

use Common\App\Traits\EnumHelper;

/**
 * The enum class for visibility status.
 */
enum WebVisibility: int
{
    use EnumHelper;

    /** @var int Web visibility: Private */
    case Private = 0;

    /** @var int Web visibility: Public */
    case Public = 1;

    /**
     * Get the label of the case.
     */
    public function label(): string
    {
        return match ($this) {
            self::Private => __('private'),
            self::Public => __('public'),
        };
    }

    /**
    * Get the color of the case.
    */
    public function color(): string
    {
        return match ($this) {
            self::Private => 'error',
            self::Public => 'success',
        };
    }

    /**
     * Get the icon of the case.
     */
    public function icon(): string
    {
        return match ($this) {
            self::Private => 'LockOutline',
            self::Public => 'PublicOutlined',
        };
    }
}

<?php

declare(strict_types=1);

namespace Common\App\Enums;

use Common\App\Traits\EnumHelper;

/**
 * The enum class for media type.
 */
enum MediaType: int
{
    use EnumHelper;

    /** @var int Media type: Image. */
    case Image = 1;

    /** @var int Media type: Video. */
    case Video = 2;

    /**
     * Get the label of the case.
     */
    public function label(): string
    {
        return match ($this) {
            self::Image => __('image'),
            self::Video => __('video'),
        };
    }
}

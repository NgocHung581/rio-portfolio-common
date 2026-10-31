<?php

declare(strict_types=1);

namespace Common\App\Enums;

use Common\App\Traits\EnumHelper;

/**
 * The enum class for media frame.
 *
 * The cases are sorted by aspect ratio (width / height), from the most portrait to the most landscape.
 */
enum MediaFrame: string
{
    use EnumHelper;

    /** @var string Media frame: 9:16. */
    case NINE_SIXTEEN = '9/16';

    /** @var string Media frame: 2:3. */
    case TWO_THREE = '2/3';

    /** @var string Media frame: 3:4. */
    case THREE_FOUR = '3/4';

    /** @var string Media frame: 4:5. */
    case FOUR_FIVE = '4/5';

    /** @var string Media frame: 1:1. */
    case ONE_ONE = '1/1';

    /** @var string Media frame: 4:3. */
    case FOUR_THREE = '4/3';

    /** @var string Media frame: 3:2. */
    case THREE_TWO = '3/2';

    /** @var string Media frame: 16:9. */
    case SIXTEEN_NINE = '16/9';

    /**
     * Get the label of the case.
     */
    public function label(): string
    {
        return match ($this) {
            self::NINE_SIXTEEN => '9:16',
            self::TWO_THREE => '2:3',
            self::THREE_FOUR => '3:4',
            self::FOUR_FIVE => '4:5',
            self::ONE_ONE => '1:1',
            self::FOUR_THREE => '4:3',
            self::THREE_TWO => '3:2',
            self::SIXTEEN_NINE => '16:9',
        };
    }
}

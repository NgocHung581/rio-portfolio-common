<?php

declare(strict_types=1);

namespace Common\App\Models;

use Common\App\Enums\MediaFrame;
use Illuminate\Database\Eloquent\Model;

/**
 * The common model class for media item.
 */
class MediaItem extends Model
{
    public $timestamps = true;

    protected $table = 'media_items';

    protected $primaryKey = 'id';

    protected $casts = [
        'frame' => MediaFrame::class,
        'is_banner' => 'boolean',
    ];
}

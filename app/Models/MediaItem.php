<?php

declare(strict_types=1);

namespace Common\App\Models;

use Common\App\Enums\MediaFrame;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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

    protected $appends = ['file_url'];

    /**
     * Get the media item's file URL.
     */
    public function getFileUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->file_path);
    }
}

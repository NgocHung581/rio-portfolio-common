<?php

declare(strict_types=1);

namespace Common\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;

    protected $table = 'albums';

    protected $primaryKey = 'id';

    protected $casts = [
        'is_highlight' => 'boolean',
    ];

    /**
     * Override the morph class, removing the 'Common\' prefix.
     */
    public function getMorphClass(): string
    {
        return str_replace('Common\\', '', parent::getMorphClass());
    }

    /**
     * Get the album's thumbnail.
     */
    public function thumbnail(): MorphOne
    {
        return $this->morphOne(MediaFile::class, 'media_fileable');
    }

    /**
     * Get the album's media items.
     */
    public function mediaItems(): HasMany
    {
        return $this->hasMany(AlbumMediaItem::class);
    }
}

<?php

declare(strict_types=1);

namespace Common\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * The common model class for gallery.
 */
class Gallery extends Model
{
    public $timestamps = true;

    protected $table = 'galleries';

    protected $primaryKey = 'id';

    /**
     * Get the gallery's media items.
     */
    public function mediaItems(): HasMany
    {
        return $this->hasMany(MediaItem::class);
    }
}

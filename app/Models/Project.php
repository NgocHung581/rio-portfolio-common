<?php

declare(strict_types=1);

namespace Common\App\Models;

use Common\App\Enums\MediaFrame;
use Common\App\Enums\WebVisibility;
use Common\App\Helpers\FileManager;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * The common model class for project.
 */
class Project extends Model
{
    public $timestamps = true;

    protected $table = 'projects';

    protected $primaryKey = 'id';

    protected $casts = [
        'is_highlight' => 'boolean',
        'web_visibility' => WebVisibility::class,
        'thumbnail_frame' => MediaFrame::class,
    ];

    protected $appends = ['thumbnail_file_url'];

    protected $with = ['category', 'galleries.mediaItems'];

    /**
     * Get the project's thumbnail file URL.
     */
    public function getThumbnailFileUrlAttribute(): string
    {
        return FileManager::getPublicStorageUrl($this->thumbnail_file_path);
    }

    /**
     * Get the project's category.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the project's galleries.
     */
    public function galleries(): HasMany
    {
        return $this->hasMany(Gallery::class);
    }
}

<?php

declare(strict_types=1);

namespace Common\App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class MediaFile extends Model
{
    protected $table = 'media_files';

    protected $primaryKey = 'id';

    protected $fillable = [
        'type',
        'url',
        'file_path',
        'file_name',
        'file_size',
        'aspect_ratio',
    ];

    /**
    * Get the parent model.
    */
    public function mediaFileable(): MorphTo
    {
        return $this->morphTo();
    }
}

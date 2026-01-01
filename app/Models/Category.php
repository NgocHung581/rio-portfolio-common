<?php

declare(strict_types=1);

namespace Common\App\Models;

use Common\App\Enums\MediaType;
use Common\App\Enums\WebVisibility;
use Illuminate\Database\Eloquent\Model;

/**
 * The common model class for the category.
 */
class Category extends Model
{
    public $timestamps = true;

    protected $table = 'categories';

    protected $primaryKey = 'id';

    protected $casts = [
        'media_type' => MediaType::class,
        'web_visibility' => WebVisibility::class,
    ];
}

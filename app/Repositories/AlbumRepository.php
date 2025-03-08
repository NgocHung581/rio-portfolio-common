<?php

declare(strict_types=1);

namespace Common\App\Repositories;

use App\Models\Album;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;

class AlbumRepository
{
    /**
     * Find albums.
     */
    public function findWithPagination(
        int $perPage,
        ?string $keyword = null,
        array $relations = [],
        array $withCountRelations = [],
        string $sortKey = 'created_at',
        string $sortOrder = 'desc',
        bool $withTrashed = true
    ): LengthAwarePaginator {
        return Album::query()
            ->withTrashed($withTrashed)
            ->when(
                isset($keyword),
                function(Builder $query) use ($keyword): void {
                    $query->whereLike('title_en', "%{$keyword}%")
                        ->orWhereLike('title_vi', "%{$keyword}%")
                        ->orWhereLike('name_en', "%{$keyword}%")
                        ->orWhereLike('name_vi', "%{$keyword}%");
                }
            )
            ->with($relations)
            ->withCount($withCountRelations)
            ->orderBy($sortKey, $sortOrder)
            ->paginate($perPage);
    }
}

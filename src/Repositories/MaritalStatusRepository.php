<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;

final class MaritalStatusRepository
{
    public function fetchForOptions(Request $request): Collection
    {
        return QueryBuilder::for(ModelShared::getMaritalStatusModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::partial('name'),
            AllowedFilter::exact('active', 'is_active'),
        ])->get();
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class VillageRepository
{
    public function fetchForOptions($request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getVillageModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::exact('code'),
            AllowedFilter::partial('name'),
            AllowedFilter::exact('district_code'),
        ])->allowedIncludes([
            AllowedInclude::relationship('district'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class DistrictRepository
{
    public function fetchForOptions(Request $request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getDistrictModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::exact('code'),
            AllowedFilter::partial('name'),
            AllowedFilter::exact('city_code'),
        ])->allowedIncludes([
            AllowedInclude::relationship('city'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

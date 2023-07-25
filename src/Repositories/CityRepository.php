<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class CityRepository
{
    public function fetchForOptions(Request $request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getCityModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::partial('code'),
            AllowedFilter::partial('name'),
            AllowedFilter::exact('province_code'),
        ])->allowedIncludes([
            AllowedInclude::relationship('province'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

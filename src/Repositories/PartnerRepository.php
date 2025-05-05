<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class PartnerRepository
{
    public function fetchForOptions(Request $request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getPartnerModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::partial('name'),
            AllowedFilter::exact('regency_id'),
            AllowedFilter::exact('city_id'),
            AllowedFilter::exact('province_id'),
            AllowedFilter::exact('status'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

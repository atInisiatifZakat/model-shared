<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class FundingTypeRepository
{
    public function fetchForOptions(Request $request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getFundingTypeModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::partial('name'),
            AllowedFilter::exact('edonation_id'),
            AllowedFilter::partial('funding_category_id'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

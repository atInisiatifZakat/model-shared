<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class SubProgramCategoryRepository
{
    public function fetchForOptions(Request $request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getSubProgramCategoryModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::partial('name'),
            AllowedFilter::exact('is_active'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

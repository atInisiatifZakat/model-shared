<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class ProgramRepository
{
    public function fetchForOptions(Request $request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getProgramModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::partial('name'),
            AllowedFilter::exact('partner_id'),
            AllowedFilter::exact('program_category_id'),
            AllowedFilter::exact('funding_type_id'),
            AllowedFilter::exact('sub_program_category_id'),
            AllowedFilter::exact('edonation_id'),
            AllowedFilter::exact('is_ramadhan'),
            AllowedFilter::exact('is_reguler'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

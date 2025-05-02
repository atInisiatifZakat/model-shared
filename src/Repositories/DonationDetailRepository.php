<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class DonationDetailRepository
{
    public function fetchForOptions(Request $request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getDonationDetailModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::exact('donation_id'),
            AllowedFilter::exact('program_id'),
            AllowedFilter::exact('funding_type_id'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

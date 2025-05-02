<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class DonationRepository
{
    public function fetchForOptions(Request $request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getDonationModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::partial('identification_number'),
            AllowedFilter::partial('edonation_id'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

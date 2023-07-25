<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;
use Inisiatif\ModelShared\ModelShared;
use Spatie\QueryBuilder\AllowedFilter;
use Inisiatif\ModelShared\Models\Donor;
use Illuminate\Contracts\Pagination\CursorPaginator;

final class DonorRepository
{
    public function fetchUsingUuid(string $uuid): ?Donor
    {
        /** @var Donor|null */
        return ModelShared::getDonorModel()->newQuery()->with([
            'branch', 'employee',
        ])->findOr($uuid, fn () => null);
    }

    public function fetchForOptions(Request $request): CursorPaginator
    {
        return QueryBuilder::for(ModelShared::getDonorModel()->newQuery(), $request)->allowedFilters([
            AllowedFilter::exact('number', 'identification_number'),
            AllowedFilter::partial('name'),
        ])->cursorPaginate($request->integer('limit'))->withQueryString();
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories\Region;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Inisiatif\ModelShared\Models\Region\Country;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Inisiatif\Package\Common\Abstracts\AbstractRepository;
use Inisiatif\Package\Contract\Common\Repository\RequestFilterAwareInterface;

final class CountryRepository extends AbstractRepository implements RequestFilterAwareInterface
{
    protected $model = Country::class;

    public function filter($request): LengthAwarePaginator
    {
        return QueryBuilder::for($this->getModel()->newQuery(), $request)
            ->allowedFilters([
                AllowedFilter::partial('code'),
                AllowedFilter::partial('name'),
            ])
            ->paginate((int) $request->query('limit'))
            ->appends((array) $request->query());
    }
}

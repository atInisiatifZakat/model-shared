<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories\Region;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Inisiatif\ModelShared\Models\Region\City;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Inisiatif\Package\Common\Abstracts\AbstractRepository;
use Inisiatif\Package\Contract\Common\Repository\RequestFilterAwareInterface;

final class CityRepository extends AbstractRepository implements RequestFilterAwareInterface
{
    protected $model = City::class;

    public function filter($request): LengthAwarePaginator
    {
        return QueryBuilder::for($this->getModel()->newQuery(), $request)
            ->allowedFilters([
                AllowedFilter::partial('code'),
                AllowedFilter::partial('name'),
                AllowedFilter::exact('province_code'),
            ])
            ->allowedIncludes([
                AllowedInclude::relationship('province'),
            ])
            ->paginate((int) $request->query('limit'))
            ->appends((array) $request->query());
    }
}

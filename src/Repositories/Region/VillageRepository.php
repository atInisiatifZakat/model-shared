<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories\Region;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\AllowedInclude;
use Inisiatif\ModelShared\Models\Region\Village;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Inisiatif\Package\Common\Abstracts\AbstractRepository;
use Inisiatif\Package\Contract\Common\Repository\RequestFilterAwareInterface;

final class VillageRepository extends AbstractRepository implements RequestFilterAwareInterface
{
    protected $model = Village::class;

    public function filter($request): LengthAwarePaginator
    {
        return QueryBuilder::for($this->getModel()->newQuery(), $request)
            ->allowedFilters([
                AllowedFilter::exact('code'),
                AllowedFilter::partial('name'),
                AllowedFilter::exact('district_code'),
            ])
            ->allowedIncludes([
                AllowedInclude::relationship('district'),
            ])
            ->paginate((int) $request->query('limit'))
            ->appends((array) $request->query());
    }
}

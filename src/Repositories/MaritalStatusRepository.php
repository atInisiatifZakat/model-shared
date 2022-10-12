<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Spatie\QueryBuilder\QueryBuilder;
use Spatie\QueryBuilder\AllowedFilter;
use Inisiatif\ModelShared\Models\MaritalStatus;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Inisiatif\Package\Common\Abstracts\AbstractRepository;
use Inisiatif\Package\Contract\Common\Repository\RequestFilterAwareInterface;

final class MaritalStatusRepository extends AbstractRepository implements RequestFilterAwareInterface
{
    protected $model = MaritalStatus::class;

    public function filter($request): LengthAwarePaginator
    {
        return QueryBuilder::for($this->getModel()->newQuery(), $request)
            ->allowedFilters([
                AllowedFilter::partial('name'),
                AllowedFilter::exact('active', 'is_active'),
            ])
            ->paginate((int) $request->query('limit'))
            ->appends((array) $request->query());
    }
}
<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers\Region;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Repositories\Region\CityRepository;

final class FilterCityController
{
    public function __invoke(Request $request, CityRepository $repository): JsonResource
    {
        return JsonResource::collection(
            $repository->filter($request)
        );
    }
}

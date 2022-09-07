<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers\Region;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Repositories\Region\CountryRepository;

final class FilterCountryController
{
    public function __invoke(Request $request, CountryRepository $repository): JsonResource
    {
        return JsonResource::collection(
            $repository->filter($request)
        );
    }
}

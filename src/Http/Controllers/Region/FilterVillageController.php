<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers\Region;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Repositories\Region\VillageRepository;

final class FilterVillageController
{
    public function __invoke(Request $request, VillageRepository $repository): JsonResource
    {
        return JsonResource::collection(
            $repository->filter($request)
        );
    }
}

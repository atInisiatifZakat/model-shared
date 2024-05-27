<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Repositories\RegionRepository;

final class FetchRegionSearchController
{
    public function __invoke(Request $request, RegionRepository $repository)
    {
        $q = $request->input('q');

        return JsonResource::collection(
            $repository->fetchSearchOptions($q)
        );
    }
}

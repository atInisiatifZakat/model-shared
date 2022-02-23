<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers\Degree;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Repositories\DegreeRepository;

final class FilterDegreeController
{
    public function __invoke(Request $request, DegreeRepository $repository): JsonResource
    {
        return JsonResource::collection(
            $repository->filter($request)
        );
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Repositories\ProgramCategoryRepository;

final class FetchProgramCategoryOptionController
{
    public function __invoke(Request $request, ProgramCategoryRepository $repository): JsonResource
    {
        return JsonResource::collection(
            $repository->fetchForOptions($request)
        );
    }
}

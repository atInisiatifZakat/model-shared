<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Repositories\ProgramRepository;

final class FetchProgramOptionController
{
    public function __invoke(Request $request, ProgramRepository $repository): JsonResource
    {
        return JsonResource::collection(
            $repository->fetchForOptions($request)
        );
    }
}

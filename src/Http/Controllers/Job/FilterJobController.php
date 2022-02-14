<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers\Job;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Repositories\JobRepository;

final class FilterJobController
{
    public function __invoke(Request $request, JobRepository $repository): JsonResource
    {
        return JsonResource::collection(
            $repository->filter($request)
        );
    }
}

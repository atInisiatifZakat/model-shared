<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers\Job;

use Inisiatif\ModelShared\Models\Job;
use Illuminate\Http\Resources\Json\JsonResource;

final class ShowJobController
{
    public function __invoke(Job $job): JsonResource
    {
        return JsonResource::make($job);
    }
}

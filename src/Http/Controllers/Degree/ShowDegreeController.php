<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers\Degree;

use Inisiatif\ModelShared\Models\Degree;
use Illuminate\Http\Resources\Json\JsonResource;

final class ShowDegreeController
{
    public function __invoke(Degree $degree): JsonResource
    {
        return JsonResource::make($degree);
    }
}

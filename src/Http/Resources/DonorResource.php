<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

final class DonorResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->getAttribute('name'),
            'identification_number' => $this->resource->getAttribute('identification_number'),
            'branch' => new BranchResource(
                $this->whenLoaded('branch', $this->resource->getAttribute('branch'))
            ),
            'employee' => new BranchResource(
                $this->whenLoaded('employee', $this->resource->getAttribute('employee'))
            ),
        ];
    }
}

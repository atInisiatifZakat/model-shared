<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Http\Resources\DonorResource;
use Inisiatif\ModelShared\Repositories\DonorRepository;

final class FetchDonorOptionController
{
    public function __invoke(Request $request, DonorRepository $repository): JsonResource
    {
        return DonorResource::collection(
            $repository->fetchForOptions($request)
        );
    }
}

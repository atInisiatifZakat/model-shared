<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Repositories\DonationDetailRepository;

final class FetchDonationDetailOptionController
{
    public function __invoke(Request $request, DonationDetailRepository $repository): JsonResource
    {
        return JsonResource::collection(
            $repository->fetchForOptions($request)
        );
    }
}

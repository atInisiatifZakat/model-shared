<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Actions\CreateMaritalStatusAction;
use Inisiatif\ModelShared\Repositories\MaritalStatusRepository;
use Inisiatif\ModelShared\DataTransfers\CreateMaritalStatusData;
use Inisiatif\ModelShared\Http\Requests\CreateMaritalStatusRequest;

final class MaritalStatusController
{
    public function index(Request $request, MaritalStatusRepository $repository): JsonResource
    {
        return JsonResource::collection(
            $repository->filter($request)
        );
    }

    public function create(CreateMaritalStatusRequest $request, CreateMaritalStatusAction $action): JsonResource
    {
        return JsonResource::make(
            $action->handleFromData(
                new CreateMaritalStatusData($request->input())
            )
        );
    }
}

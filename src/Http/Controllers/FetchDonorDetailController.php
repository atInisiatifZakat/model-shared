<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Http\Controllers;

use Ramsey\Uuid\Uuid;
use Illuminate\Http\Resources\Json\JsonResource;
use Inisiatif\ModelShared\Http\Resources\DonorResource;
use Inisiatif\ModelShared\Repositories\DonorRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

final class FetchDonorDetailController
{
    public function __invoke(string $donorId, DonorRepository $repository): JsonResource
    {
        if (Uuid::isValid($donorId) === false) {
            throw new NotFoundHttpException('Invalid donor id');
        }

        return DonorResource::make(
            $repository->fetchUsingUuid($donorId)
        );
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Actions;

use Inisiatif\ModelShared\Models\MaritalStatus;
use Inisiatif\ModelShared\DataTransfers\CreateMaritalStatusData;

final class CreateMaritalStatusAction
{
    public static function handleFromData(CreateMaritalStatusData $data): MaritalStatus
    {
        $status = new MaritalStatus();

        $status->forceFill(
            $data->all()
        )->save();

        return $status;
    }
}

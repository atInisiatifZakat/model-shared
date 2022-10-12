<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\DataTransfers;

use Spatie\DataTransferObject\Attributes\MapTo;
use Spatie\DataTransferObject\Attributes\MapFrom;
use Spatie\DataTransferObject\DataTransferObject;

final class CreateMaritalStatusData extends DataTransferObject
{
    #[MapTo('name')]
    #[MapFrom('name')]
    public string $name;

    #[MapTo('is_active')]
    #[MapFrom('is_active')]
    public bool $isActive;
}

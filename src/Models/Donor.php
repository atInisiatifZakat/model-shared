<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Inisiatif\ModelShared\Registrars\DonorModelRegistrar;

final class Donor extends Model
{
    use HasUuids;

    public function getConnectionName(): ?string
    {
        /** @var DonorModelRegistrar $registrar */
        $registrar = app(DonorModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var DonorModelRegistrar $registrar */
        $registrar = app(DonorModelRegistrar::class);

        return $registrar->getTableName();
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Registrars\BeneficiaryTypeModelRegistrar;

final class BeneficiaryType extends Model
{
    public function getConnectionName(): ?string
    {
        /** @var BeneficiaryTypeModelRegistrar $registrar */
        $registrar = app(BeneficiaryTypeModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var BeneficiaryTypeModelRegistrar $registrar */
        $registrar = app(BeneficiaryTypeModelRegistrar::class);

        return $registrar->getTableName();
    }
}

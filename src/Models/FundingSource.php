<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Registrars\FundingSourceModelRegistrar;

final class FundingSource extends Model
{
    public function getConnectionName(): ?string
    {
        /** @var FundingSourceModelRegistrar $registrar */
        $registrar = app(FundingSourceModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var FundingSourceModelRegistrar $registrar */
        $registrar = app(FundingSourceModelRegistrar::class);

        return $registrar->getTableName();
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\AccountModelRegistrar;

final class Account extends Model
{
    public function getConnectionName(): ?string
    {
        /** @var AccountModelRegistrar $registrar */
        $registrar = app(AccountModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var AccountModelRegistrar $registrar */
        $registrar = app(AccountModelRegistrar::class);

        return $registrar->getTableName();
    }

    public function fundingSource(): BelongsTo
    {
        return $this->belongsTo(FundingSource::class)->withoutGlobalScopes();
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Registrars\BankModelRegistrar;

final class Bank extends Model
{
    public function getConnectionName(): ?string
    {
        /** @var BankModelRegistrar $registrar */
        $registrar = app(BankModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var BankModelRegistrar $registrar */
        $registrar = app(BankModelRegistrar::class);

        return $registrar->getTableName();
    }
}

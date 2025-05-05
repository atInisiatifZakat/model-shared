<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Inisiatif\ModelShared\Registrars\PartnerModelRegistrar;

final class Partner extends Model
{
    use SoftDeletes;

    public function getConnectionName(): ?string
    {
        /** @var PartnerModelRegistrar $registrar */
        $registrar = app(PartnerModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var PartnerModelRegistrar $registrar */
        $registrar = app(PartnerModelRegistrar::class);

        return $registrar->getTableName();
    }
}

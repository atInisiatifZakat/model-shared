<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Inisiatif\ModelShared\Registrars\PartnerTypeModelRegistrar;

final class PartnerType extends Model
{
    public function getConnectionName(): ?string
    {
        /** @var PartnerTypeModelRegistrar $registrar */
        $registrar = app(PartnerTypeModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var PartnerTypeModelRegistrar $registrar */
        $registrar = app(PartnerTypeModelRegistrar::class);

        return $registrar->getTableName();
    }

    public function partners(): HasMany
    {
        return $this->hasMany(Partner::class, 'partner_type_id');
    }
}

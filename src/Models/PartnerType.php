<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Inisiatif\ModelShared\Registrars\PartnerModelRegistrar;

final class PartnerType extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getPartnerTypeTableName();
    }

    protected function getModelRegistrar(): PartnerModelRegistrar
    {
        return app(PartnerModelRegistrar::class);
    }

    /**
     * @return HasMany<Partner, $this>
     */
    public function partners(): HasMany
    {
        return $this->hasMany(Partner::class, 'partner_type_id');
    }
}

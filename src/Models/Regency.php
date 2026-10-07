<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\RegionModelRegistrar;

final class Regency extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getRegencyTableName();
    }

    protected function getModelRegistrar(): RegionModelRegistrar
    {
        return app(RegionModelRegistrar::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(
            $this->getModelRegistrar()->getCityModelClass(),
            'city_id'
        )->withoutGlobalScopes();
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\RegionModelRegistrar;

final class Village extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getVillageTableName();
    }

    protected function getModelRegistrar(): RegionModelRegistrar
    {
        return app(RegionModelRegistrar::class);
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(
            $this->getModelRegistrar()->getDistrictModelClass(),
            'district_code',
            'code'
        );
    }
}

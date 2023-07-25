<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\RegionModelRegistrar;

final class District extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getDistrictTableName();
    }

    protected function getModelRegistrar(): RegionModelRegistrar
    {
        return app(RegionModelRegistrar::class);
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(
            $this->getModelRegistrar()->getCityModelClass(),
            'city_code',
            'code'
        );
    }
}

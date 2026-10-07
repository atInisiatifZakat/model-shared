<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Inisiatif\ModelShared\Registrars\DonationRegionModelRegistrar;

final class DonationProvince extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getProvinceTableName();
    }

    protected function getModelRegistrar(): DonationRegionModelRegistrar
    {
        return app(DonationRegionModelRegistrar::class);
    }

    /**
     * @return HasMany<DonationCity, $this>
     */
    public function cities(): HasMany
    {
        return $this->hasMany(DonationCity::class, 'province_id');
    }
}

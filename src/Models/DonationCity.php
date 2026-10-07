<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\DonationRegionModelRegistrar;

final class DonationCity extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getCityTableName();
    }

    protected function getModelRegistrar(): DonationRegionModelRegistrar
    {
        return app(DonationRegionModelRegistrar::class);
    }

    /**
     * @return BelongsTo<DonationProvince, $this>
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(DonationProvince::class, 'province_id')->withoutGlobalScopes();
    }

    /**
     * @return HasMany<DonationRegency, $this>
     */
    public function regencies(): HasMany
    {
        return $this->hasMany(DonationRegency::class, 'city_id');
    }
}

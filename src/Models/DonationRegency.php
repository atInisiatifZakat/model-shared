<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\DonationRegionModelRegistrar;

final class DonationRegency extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getRegencyTableName();
    }

    protected function getModelRegistrar(): DonationRegionModelRegistrar
    {
        return app(DonationRegionModelRegistrar::class);
    }

    /**
     * @return BelongsTo<DonationCity, $this>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(DonationCity::class, 'city_id')->withoutGlobalScopes();
    }
}

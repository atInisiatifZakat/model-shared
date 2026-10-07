<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\PartnerModelRegistrar;

final class Partner extends Model
{
    use HasUuids;
    use SoftDeletes;

    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getPartnerTableName();
    }

    protected function getModelRegistrar(): PartnerModelRegistrar
    {
        return app(PartnerModelRegistrar::class);
    }

    /**
     * @return BelongsTo<PartnerType, $this>
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(PartnerType::class, 'partner_type_id');
    }

    /**
     * @return BelongsTo<DonationProvince, $this>
     */
    public function province(): BelongsTo
    {
        return $this->belongsTo(DonationProvince::class, 'province_id');
    }

    /**
     * @return BelongsTo<DonationCity, $this>
     */
    public function city(): BelongsTo
    {
        return $this->belongsTo(DonationCity::class, 'city_id');
    }

    /**
     * @return BelongsTo<DonationRegency, $this>
     */
    public function regency(): BelongsTo
    {
        return $this->belongsTo(DonationRegency::class, 'regency_id');
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\PartnerModelRegistrar;
use Inisiatif\ModelShared\Registrars\PartnerTypeModelRegistrar;
use Inisiatif\ModelShared\Registrars\RegionModelRegistrar;

final class Partner extends Model
{
    use HasUuids;
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

    public function type(): BelongsTo
    {
        /** @var PartnerTypeModelRegistrar $registrar */
        $registrar = app(PartnerTypeModelRegistrar::class);

        return $this->belongsTo($registrar->getModelClassName(), 'partner_type_id');
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(
            app(RegionModelRegistrar::class)->getProvinceModelClass()
        );
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(
            app(RegionModelRegistrar::class)->getCityModelClass()
        );
    }

    public function regency(): BelongsTo
    {
        return $this->belongsTo(
            app(RegionModelRegistrar::class)->getRegencyModelClass()
        );
    }
}

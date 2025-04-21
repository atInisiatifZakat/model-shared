<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Inisiatif\ModelShared\Registrars\DonorModelRegistrar;
use Inisiatif\ModelShared\Registrars\DonorPhoneModelRegistrar;

final class Donor extends Model
{
    use HasUuids;

    public function getConnectionName(): ?string
    {
        /** @var DonorModelRegistrar $registrar */
        $registrar = app(DonorModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var DonorModelRegistrar $registrar */
        $registrar = app(DonorModelRegistrar::class);

        return $registrar->getTableName();
    }

    public function phones(): HasMany
    {
        /** @var DonorPhoneModelRegistrar $registrar */
        $registrar = app(DonorPhoneModelRegistrar::class);

        return $this->hasMany($registrar->getModelClassName());
    }

    public function phone(): BelongsTo
    {
        /** @var DonorPhoneModelRegistrar $registrar */
        $registrar = app(DonorPhoneModelRegistrar::class);

        return $this->belongsTo($registrar->getModelClassName(), 'donor_phone_id');
    }
}

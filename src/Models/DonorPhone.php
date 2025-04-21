<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\DonorModelRegistrar;
use Inisiatif\ModelShared\Registrars\DonorPhoneModelRegistrar;

final class DonorPhone extends Model
{
    use SoftDeletes;

    protected $casts = [
        'is_primary' => 'boolean',
        'is_valid_format' => 'boolean',
        'is_support_whatsapp' => 'boolean',
    ];

    public function getConnectionName(): ?string
    {
        /** @var DonorPhoneModelRegistrar $registrar */
        $registrar = app(DonorPhoneModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var DonorPhoneModelRegistrar $registrar */
        $registrar = app(DonorPhoneModelRegistrar::class);

        return $registrar->getTableName();
    }

    public function donor(): BelongsTo
    {   /** @var DonorModelRegistrar $registrar */
        $registrar = app(DonorModelRegistrar::class);

        return $this->belongsTo($registrar->getModelClassName(), 'donor_id', 'id');
    }

    public function getCountryCode(): string
    {
        return $this->getAttribute('country_code') ?? 'ID';
    }
}

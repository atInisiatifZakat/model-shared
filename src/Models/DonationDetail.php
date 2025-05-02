<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Inisiatif\ModelShared\Registrars\DonationModelRegistrar;

final class DonationDetail extends Model
{
    use SoftDeletes;

    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getDonationDetailTableName();
    }

    protected function getModelRegistrar(): DonationModelRegistrar
    {
        return app(DonationModelRegistrar::class);
    }

    protected $casts = [
        'qurban_names' => 'array',
    ];

    public function funding(): BelongsTo
    {
        return $this->belongsTo(FundingType::class,'funding_type_id')->withoutGlobalScopes();
    }

    public function toOrderItemAttributes()
    {
        return [
            'edonation_id' => $this->getKey(),
            'names' => $this->getAttribute('qurban_names') ?? [],
            'currency' => 'IDR',
            'currency_rate' => 1,
            'quantity' => 1,
            'amount' => $this->getAttribute('amount'),
            'total_amount' => $this->getAttribute('amount'),
            'amount_equivalent' => $this->getAttribute('amount'),
        ];
    }
}

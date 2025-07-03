<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Inisiatif\ModelShared\Registrars\DonationModelRegistrar;

final class Donation extends Model
{
    use HasUuids;
    use SoftDeletes;

    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getDonationTableName();
    }

    protected function getModelRegistrar(): DonationModelRegistrar
    {
        return app(DonationModelRegistrar::class);
    }

    public function details(): HasMany
    {
        return $this->hasMany(DonationDetail::class);
    }

    public function getDetails(): Collection
    {
        return $this->loadMissing('details')->getAttribute('details');
    }

    public function toOrderAttributes()
    {
        $defaultAttributes = $this->only([
            'identification_number', 'partner_id', 'donor_id', 'employee_id',
            'branch_id', 'currency', 'currency_rate', 'tracking_id', 'tracking_short_url',
        ]);

        return array_merge($defaultAttributes, [
            'is_comitment' => false,
            'source' => $this->getAttribute('source') ?: 'edonation',
            'source_id' => $this->getAttribute('source_id') ?: $this->getKey(),
            'date' => $this->getAttribute('transaction_date'),
            'amount' => 0, // TODO: Fix this #1
            'amount_equivalent' => 0, // TODO: Fix this #1
        ]);
    }
}

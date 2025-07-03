<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\ProgramModelRegistrar;

final class Program extends Model
{
    use HasUuids;

    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getProgramTableName();
    }

    protected function getModelRegistrar(): ProgramModelRegistrar
    {
        return app(ProgramModelRegistrar::class);
    }

    public function funding(): BelongsTo
    {
        return $this->belongsTo(FundingType::class, 'funding_type_id')->withoutGlobalScopes();
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Inisiatif\ModelShared\Registrars\FundingModelRegistrar;

final class FundingType extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getFundingTypeModelClass();
    }

    protected function getModelRegistrar(): FundingModelRegistrar
    {
        return app(FundingModelRegistrar::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(FundingCategory::class, 'funding_category_id')->withoutGlobalScopes();
    }
}

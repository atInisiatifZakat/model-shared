<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Registrars\FundingModelRegistrar;

final class FundingCategory extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getFundingCategoryModelClass();
    }

    protected function getModelRegistrar(): FundingModelRegistrar
    {
        return app(FundingModelRegistrar::class);
    }

    public function donation()
    {
        return $this->hasMany(Donation::class)->withoutGlobalScopes();
    }
}

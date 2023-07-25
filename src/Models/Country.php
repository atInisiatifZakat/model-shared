<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Registrars\RegionModelRegistrar;

final class Country extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getCountryTableName();
    }

    protected function getModelRegistrar(): RegionModelRegistrar
    {
        return app(RegionModelRegistrar::class);
    }
}

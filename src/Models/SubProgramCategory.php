<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Registrars\ProgramModelRegistrar;

final class SubProgramCategory extends Model
{
    public function getConnectionName(): ?string
    {
        return $this->getModelRegistrar()->getConnectionName();
    }

    public function getTable(): string
    {
        return $this->getModelRegistrar()->getSubProgramCategoryTableName();
    }

    protected function getModelRegistrar(): ProgramModelRegistrar
    {
        return app(ProgramModelRegistrar::class);
    }
}

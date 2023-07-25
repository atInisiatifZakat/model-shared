<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Registrars\DegreeModelRegistrar;

final class Degree extends Model
{
    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function getConnectionName(): ?string
    {
        /** @var DegreeModelRegistrar $registrar */
        $registrar = app(DegreeModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var DegreeModelRegistrar $registrar */
        $registrar = app(DegreeModelRegistrar::class);

        return $registrar->getTableName();
    }

    public function isActive(): bool
    {
        return $this->getAttribute('is_active');
    }

    public function isNotActive(): bool
    {
        return ! $this->isActive();
    }
}

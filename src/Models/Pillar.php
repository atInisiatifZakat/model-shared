<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Inisiatif\ModelShared\Registrars\PillarModelRegistrar;

final class Pillar extends Model
{
    use HasUuids;

    public function getConnectionName(): ?string
    {
        /** @var PillarModelRegistrar $registrar */
        $registrar = app(PillarModelRegistrar::class);

        return $registrar->getConnectionName();
    }

    public function getTable(): string
    {
        /** @var PillarModelRegistrar $registrar */
        $registrar = app(PillarModelRegistrar::class);

        return $registrar->getTableName();
    }
}

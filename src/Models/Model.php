<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model as Eloquent;
use Inisiatif\Package\Contract\Common\Model\ResourceInterface;

abstract class Model extends Eloquent implements ResourceInterface
{
    public function getTable(): string
    {
        $reflection = new \ReflectionClass($this);

        $tableName = Str::snake(
            $reflection->getShortName()
        );

        return \config('shared.tables.' . $tableName, parent::getTable());
    }

    public function getId(): int|string|null
    {
        return $this->getKey();
    }

    public function setId($id): mixed
    {
        return $this->setAttribute($this->getKeyName(), $id);
    }
}

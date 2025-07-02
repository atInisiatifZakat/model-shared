<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Registrars;

use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Illuminate\Database\Eloquent\Model;

final class AccountModelRegistrar
{
    private readonly array $config;

    private function __construct(array $config)
    {
        Assert::keyExists($config, 'connection');
        Assert::keyExists($config, 'tables');
        Assert::keyExists($config, 'migration');
        Assert::keyExists($config, 'models');

        $this->config = $config;
    }

    public static function make(array $config): self
    {
        return new self($config);
    }

    public function runningModelMigration(): bool
    {
        return (bool) Arr::get($this->config, 'migration');
    }

    public function getTableName(): string
    {
        return Arr::get($this->config, 'tables');
    }

    public function getModelClassName(): string
    {
        return Arr::get($this->config, 'models');
    }

    public function getModel(): Model
    {
        return app(
            $this->getModelClassName()
        );
    }

    public function getConnectionName(): string
    {
        return Arr::get($this->config, 'connection');
    }
}

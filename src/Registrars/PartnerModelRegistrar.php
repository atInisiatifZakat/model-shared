<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Registrars;

use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Models\Partner;
use Inisiatif\ModelShared\Models\PartnerType;

final class PartnerModelRegistrar
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
        return $this->getPartnerTableName();
    }

    public function getPartnerTableName(): string
    {
        $tables = Arr::get($this->config, 'tables');

        if (\is_array($tables)) {
            return Arr::get($tables, 'partner', 'partners');
        }

        return (string) $tables;
    }

    public function getPartnerTypeTableName(): string
    {
        return Arr::get($this->config, 'tables.partner_type', 'partner_types');
    }

    public function getModelClassName(): string
    {
        return $this->getPartnerModelClass();
    }

    /**
     * @return class-string<Model>
     */
    public function getPartnerModelClass(): string
    {
        $models = Arr::get($this->config, 'models');

        if (\is_array($models)) {
            return Arr::get($models, 'partner', Partner::class);
        }

        return (string) $models;
    }

    /**
     * @return class-string<Model>
     */
    public function getPartnerTypeModelClass(): string
    {
        return Arr::get($this->config, 'models.partner_type', PartnerType::class);
    }

    public function getModel(): Model
    {
        return $this->getPartnerModel();
    }

    public function getPartnerModel(): Model
    {
        return app($this->getPartnerModelClass());
    }

    public function getPartnerTypeModel(): Model
    {
        return app($this->getPartnerTypeModelClass());
    }

    public function getConnectionName(): string
    {
        return Arr::get($this->config, 'connection');
    }
}

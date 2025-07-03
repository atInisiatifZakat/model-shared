<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Registrars;

use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Models\FundingType;
use Inisiatif\ModelShared\Models\FundingCategory;

final class FundingModelRegistrar
{
    private readonly array $config;

    private function __construct(array $config)
    {
        Assert::keyExists($config, 'connection');
        Assert::keyExists($config, 'migration');

        Assert::keyExists($config, 'tables');
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

    public function getConnectionName(): string
    {
        return Arr::get($this->config, 'connection');
    }

    public function getFundingCategoryTableName(): string
    {
        return Arr::get($this->config, 'tables.funding_category', 'funding_categories');
    }

    public function getFundingTypeTableName(): string
    {
        return Arr::get($this->config, 'tables.funding_type', 'funding_types');
    }

    /**
     * @return class-string<Model>
     */
    public function getFundingCategoryModelClass(): string
    {
        return Arr::get($this->config, 'models.funding_category', FundingCategory::class);
    }

    /**
     * @return class-string<Model>
     */
    public function getFundingTypeModelClass(): string
    {
        return Arr::get($this->config, 'models.funding_type', FundingType::class);
    }

    public function getFundingCategoryModel(): Model
    {
        return app(
            $this->getFundingCategoryModelClass()
        );
    }

    public function getFundingTypeModel(): Model
    {
        return app(
            $this->getFundingTypeModelClass()
        );
    }
}

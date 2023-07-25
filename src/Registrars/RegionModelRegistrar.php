<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Registrars;

use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Inisiatif\ModelShared\Models\City;
use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Models\Country;
use Inisiatif\ModelShared\Models\Village;
use Inisiatif\ModelShared\Models\District;
use Inisiatif\ModelShared\Models\Province;

final class RegionModelRegistrar
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

    public function getCountryTableName(): string
    {
        return Arr::get($this->config, 'tables.country', 'countries');
    }

    public function getProvinceTableName(): string
    {
        return Arr::get($this->config, 'tables.province', 'provinces');
    }

    public function getCityTableName(): string
    {
        return Arr::get($this->config, 'tables.city', 'cities');
    }

    public function getDistrictTableName(): string
    {
        return Arr::get($this->config, 'tables.district', 'districts');
    }

    /**
     * @return class-string<Model>
     */
    public function getVillageTableName(): string
    {
        return Arr::get($this->config, 'tables.village', 'villages');
    }

    /**
     * @return class-string<Model>
     */
    public function getCountryModelClass(): string
    {
        return Arr::get($this->config, 'models.country', Country::class);
    }

    /**
     * @return class-string<Model>
     */
    public function getProvinceModelClass(): string
    {
        return Arr::get($this->config, 'models.province', Province::class);
    }

    /**
     * @return class-string<Model>
     */
    public function getCityModelClass(): string
    {
        return Arr::get($this->config, 'models.city', City::class);
    }

    /**
     * @return class-string<Model>
     */
    public function getDistrictModelClass(): string
    {
        return Arr::get($this->config, 'models.district', District::class);
    }

    /**
     * @return class-string<Model>
     */
    public function getVillageModelClass(): string
    {
        return Arr::get($this->config, 'models.village', Village::class);
    }

    public function getCountryModel(): Model
    {
        return app(
            $this->getCountryModelClass()
        );
    }

    public function getProvinceModel(): Model
    {
        return app(
            $this->getProvinceModelClass()
        );
    }

    public function getCityModel(): Model
    {
        return app(
            $this->getCityModelClass()
        );
    }

    public function getDistrictModel(): Model
    {
        return app(
            $this->getDistrictModelClass()
        );
    }

    public function getVillageModel(): Model
    {
        return app(
            $this->getVillageModelClass()
        );
    }
}

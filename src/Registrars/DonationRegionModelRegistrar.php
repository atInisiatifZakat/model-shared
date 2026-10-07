<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Registrars;

use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Models\DonationCity;
use Inisiatif\ModelShared\Models\DonationRegency;
use Inisiatif\ModelShared\Models\DonationProvince;

final class DonationRegionModelRegistrar
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

    public function getProvinceTableName(): string
    {
        return Arr::get($this->config, 'tables.province', 'donation_provinces');
    }

    public function getCityTableName(): string
    {
        return Arr::get($this->config, 'tables.city', 'donation_cities');
    }

    public function getRegencyTableName(): string
    {
        return Arr::get($this->config, 'tables.regency', 'donation_regencies');
    }

    /**
     * @return class-string<Model>
     */
    public function getProvinceModelClass(): string
    {
        return Arr::get($this->config, 'models.province', DonationProvince::class);
    }

    /**
     * @return class-string<Model>
     */
    public function getCityModelClass(): string
    {
        return Arr::get($this->config, 'models.city', DonationCity::class);
    }

    /**
     * @return class-string<Model>
     */
    public function getRegencyModelClass(): string
    {
        return Arr::get($this->config, 'models.regency', DonationRegency::class);
    }

    public function getProvinceModel(): Model
    {
        return app($this->getProvinceModelClass());
    }

    public function getCityModel(): Model
    {
        return app($this->getCityModelClass());
    }

    public function getRegencyModel(): Model
    {
        return app($this->getRegencyModelClass());
    }
}

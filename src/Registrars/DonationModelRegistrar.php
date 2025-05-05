<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Registrars;

use Illuminate\Support\Arr;
use Webmozart\Assert\Assert;
use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Models\Donation;
use Inisiatif\ModelShared\Models\DonationDetail;

final class DonationModelRegistrar
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

    public function getDonationTableName(): string
    {
        return Arr::get($this->config, 'tables.donation', 'donations');
    }

    public function getDonationDetailTableName(): string
    {
        return Arr::get($this->config, 'tables.donation_detail', 'donation_details');
    }

    /**
     * @return class-string<Model>
     */
    public function getDonationModelClass(): string
    {
        return Arr::get($this->config, 'models.donation', Donation::class);
    }

    /**
     * @return class-string<Model>
     */
    public function getDonationDetailModelClass(): string
    {
        return Arr::get($this->config, 'models.donation_detail', DonationDetail::class);
    }

    public function getDonationModel(): Model
    {
        return app(
            $this->getDonationModelClass()
        );
    }

    public function getDonationDetailModel(): Model
    {
        return app(
            $this->getDonationDetailModelClass()
        );
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Providers;

use Inisiatif\ModelShared\ModelShared;
use Illuminate\Support\ServiceProvider;

final class ModelSharedServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../../config/shared.php', 'shared');

        if (ModelShared::isRunningJobMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/2022_01_15_000000_create_jobs_tables.php');
        }

        if (ModelShared::isRunningDegreeMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/2022_02_10_000000_create_degrees_tables.php');
        }

        if (ModelShared::isRunningRegionMigrations()) {
            $this->loadMigrationsFrom([
                __DIR__ . '/../../database/migrations/2022_08_26_042533_create_provinces_table.php',
                __DIR__ . '/../../database/migrations/2022_08_26_065925_create_cities_table.php',
                __DIR__ . '/../../database/migrations/2022_08_26_072741_create_districts_table.php',
                __DIR__ . '/../../database/migrations/2022_08_26_074948_create_villages_table.php',
                __DIR__ . '/../../database/migrations/2022_09_01_000000_create_countries_table.php',
            ]);
        }

        if (ModelShared::isRunningMaritalStatusMigrations()) {
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations/2022_09_06_033913_create_marital_statuses_table.php');
        }
    }
}

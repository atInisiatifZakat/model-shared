<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Inisiatif\ModelShared\Registrars\JobModelRegistrar;
use Inisiatif\ModelShared\Registrars\DonorModelRegistrar;
use Inisiatif\ModelShared\Registrars\DegreeModelRegistrar;
use Inisiatif\ModelShared\Registrars\RegionModelRegistrar;
use Inisiatif\ModelShared\Registrars\MaritalStatusModelRegistrar;

final class ModelSharedServiceProvider extends PackageServiceProvider
{
    public function packageRegistered(): void
    {
        $this->registerDegreeModelRegistrar();
        $this->registerJobModelRegistrar();
        $this->registerMaritalStatusModelRegistrar();
        $this->registerRegionModelRegistrar();
    }

    public function configurePackage(Package $package): void
    {
        $package->name('model-shared')->hasConfigFile('shared');
    }

    protected function registerDegreeModelRegistrar(): void
    {
        $registrar = DegreeModelRegistrar::make(
            \config('shared.degree')
        );

        $this->app->singleton(DegreeModelRegistrar::class, fn () => $registrar);

        if ($registrar->runningModelMigration()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations/create_degrees_tables.php');
        }
    }

    protected function registerJobModelRegistrar(): void
    {
        $registrar = JobModelRegistrar::make(
            \config('shared.job')
        );

        $this->app->singleton(JobModelRegistrar::class, fn () => $registrar);

        if ($registrar->runningModelMigration()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations/create_jobs_tables.php');
        }
    }

    protected function registerMaritalStatusModelRegistrar(): void
    {
        $registrar = MaritalStatusModelRegistrar::make(
            \config('shared.marital_status')
        );

        $this->app->singleton(MaritalStatusModelRegistrar::class, fn () => $registrar);

        if ($registrar->runningModelMigration()) {
            $this->loadMigrationsFrom(__DIR__.'/../database/migrations/create_marital_statuses_table.php');
        }
    }

    protected function registerRegionModelRegistrar(): void
    {
        $registrar = RegionModelRegistrar::make(
            \config('shared.region')
        );

        $this->app->singleton(RegionModelRegistrar::class, fn () => $registrar);

        if ($registrar->runningModelMigration()) {
            $this->loadMigrationsFrom([
                __DIR__.'/../database/migrations/000_create_countries_table.php',
                __DIR__.'/../database/migrations/001_create_provinces_table.php',
                __DIR__.'/../database/migrations/002_create_cities_table.php',
                __DIR__.'/../database/migrations/003_create_districts_table.php',
                __DIR__.'/../database/migrations/004_create_villages_table.php',
            ]);
        }
    }

    protected function registerDonorModelRegistrar(): void
    {
        $registrar = DonorModelRegistrar::make(
            \config('shared.donor')
        );

        $this->app->singleton(DonorModelRegistrar::class, fn () => $registrar);

        if ($registrar->runningModelMigration()) {
            $this->loadMigrationsFrom([
                __DIR__.'/../database/migrations/005_create_donors_table.php',
            ]);
        }
    }
}

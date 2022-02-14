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
            $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');
        }
    }
}

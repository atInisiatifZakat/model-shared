<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared;

use Illuminate\Routing\Router;

final class ModelShared
{
    public static bool $runningJobMigration = true;

    public static function runningJobMigration(bool $run = true): void
    {
        self::$runningJobMigration = $run;
    }

    public static function ignoreJobMigrations(): void
    {
        self::runningJobMigration(false);
    }

    public static function isRunningJobMigrations(): bool
    {
        return self::$runningJobMigration;
    }

    public static function isIgnoreJobMigrations(): bool
    {
        return self::$runningJobMigration;
    }

    public static function jobRoute(Router $router): void
    {
        Routes::job($router);
    }
}

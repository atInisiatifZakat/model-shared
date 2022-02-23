<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Concern;

trait JobMigration
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
}

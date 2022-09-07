<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Concern;

trait RegionMigration
{
    public static bool $runningRegionMigration = false;

    public static function runningRegionMigration(bool $run = true): void
    {
        self::$runningRegionMigration = $run;
    }

    public static function ignoreRegionMigrations(): void
    {
        self::runningRegionMigration(false);
    }

    public static function isRunningRegionMigrations(): bool
    {
        return self::$runningRegionMigration;
    }

    public static function isIgnoreRegionMigrations(): bool
    {
        return self::$runningRegionMigration;
    }
}

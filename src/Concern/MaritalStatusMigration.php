<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Concern;

trait MaritalStatusMigration
{
    public static bool $runningMaritalStatusMigration = false;

    public static function runningMaritalStatusMigration(bool $run = true): void
    {
        self::$runningMaritalStatusMigration = $run;
    }

    public static function ignoreMaritalStatusMigrations(): void
    {
        self::runningMaritalStatusMigration(false);
    }

    public static function isRunningMaritalStatusMigrations(): bool
    {
        return self::$runningMaritalStatusMigration;
    }

    public static function isIgnoreMaritalStatusMigrations(): bool
    {
        return self::$runningMaritalStatusMigration;
    }
}

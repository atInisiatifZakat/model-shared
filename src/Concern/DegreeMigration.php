<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Concern;

trait DegreeMigration
{
    public static bool $runningDegreeMigration = true;

    public static function runningDegreeMigration(bool $run = true): void
    {
        self::$runningDegreeMigration = $run;
    }

    public static function ignoreDegreeMigrations(): void
    {
        self::runningDegreeMigration(false);
    }

    public static function isRunningDegreeMigrations(): bool
    {
        return self::$runningDegreeMigration;
    }

    public static function isIgnoreDegreeMigrations(): bool
    {
        return self::$runningDegreeMigration;
    }
}

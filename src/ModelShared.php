<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared;

use Illuminate\Routing\Router;
use Inisiatif\ModelShared\Concern\JobMigration;
use Inisiatif\ModelShared\Concern\DegreeMigration;

final class ModelShared
{
    use JobMigration;

    use DegreeMigration;

    public static function jobRoute(Router $router): void
    {
        Routes::job($router);
    }

    public static function degreeRoute(Router $router): void
    {
        Routes::degree($router);
    }
}

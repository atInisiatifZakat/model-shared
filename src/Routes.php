<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared;

use Illuminate\Routing\Router;
use Inisiatif\ModelShared\Http\Controllers\Job\ShowJobController;
use Inisiatif\ModelShared\Http\Controllers\Job\FilterJobController;
use Inisiatif\ModelShared\Http\Controllers\Degree\ShowDegreeController;
use Inisiatif\ModelShared\Http\Controllers\Degree\FilterDegreeController;

final class Routes
{
    public static function job(Router $router): void
    {
        $router->get('/job', FilterJobController::class);
        $router->get('/job/{job}', ShowJobController::class);
    }

    public static function degree(Router $router): void
    {
        $router->get('/degree', FilterDegreeController::class);
        $router->get('/degree/{degree}', ShowDegreeController::class);
    }
}

<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared;

use Illuminate\Routing\Router;
use Inisiatif\ModelShared\Http\Controllers\Job\ShowJobController;
use Inisiatif\ModelShared\Http\Controllers\Job\FilterJobController;

final class Routes
{
    public static function job(Router $router): void
    {
        $router->get('/job', FilterJobController::class);
        $router->get('/job/{job}', ShowJobController::class);
    }
}

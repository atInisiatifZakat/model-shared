<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared;

use Illuminate\Routing\Router;
use Inisiatif\ModelShared\Http\Controllers\Job\ShowJobController;
use Inisiatif\ModelShared\Http\Controllers\Job\FilterJobController;
use Inisiatif\ModelShared\Http\Controllers\MaritalStatusController;
use Inisiatif\ModelShared\Http\Controllers\Degree\ShowDegreeController;
use Inisiatif\ModelShared\Http\Controllers\Region\FilterCityController;
use Inisiatif\ModelShared\Http\Controllers\Degree\FilterDegreeController;
use Inisiatif\ModelShared\Http\Controllers\Region\FilterCountryController;
use Inisiatif\ModelShared\Http\Controllers\Region\FilterVillageController;
use Inisiatif\ModelShared\Http\Controllers\Region\FilterDistrictController;
use Inisiatif\ModelShared\Http\Controllers\Region\FilterProvinceController;

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

    public static function region(Router $router): void
    {
        $router->get('/countries', FilterCountryController::class);
        $router->get('/provinces', FilterProvinceController::class);
        $router->get('/cities', FilterCityController::class);
        $router->get('/districts', FilterDistrictController::class);
        $router->get('/villages', FilterVillageController::class);
    }

    public static function maritalStatus(Router $router): void
    {
        $router->controller(MaritalStatusController::class)
            ->group(static function (Router $router): void {
                $router->get('/marital-status', 'index');
                $router->post('/marital-status', 'create');
            });
    }
}

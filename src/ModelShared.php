<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared;

use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Registrars\JobModelRegistrar;
use Inisiatif\ModelShared\Registrars\DonorModelRegistrar;
use Inisiatif\ModelShared\Registrars\DegreeModelRegistrar;
use Inisiatif\ModelShared\Registrars\RegionModelRegistrar;
use Inisiatif\ModelShared\Registrars\MaritalStatusModelRegistrar;

final class ModelShared
{
    public static function getDegreeModel(): Model
    {
        return app(DegreeModelRegistrar::class)->getModel();
    }

    public static function getJobModel(): Model
    {
        return app(JobModelRegistrar::class)->getModel();
    }

    public static function getMaritalStatusModel(): Model
    {
        return app(MaritalStatusModelRegistrar::class)->getModel();
    }

    public static function getCountryModel(): Model
    {
        return self::getRegionModelRegistrar()->getCountryModel();
    }

    public static function getProvinceModel(): Model
    {
        return self::getRegionModelRegistrar()->getProvinceModel();
    }

    public static function getCityModel(): Model
    {
        return self::getRegionModelRegistrar()->getCityModel();
    }

    public static function getDistrictModel(): Model
    {
        return self::getRegionModelRegistrar()->getDistrictModel();
    }

    public static function getVillageModel(): Model
    {
        return self::getRegionModelRegistrar()->getVillageModel();
    }

    protected static function getRegionModelRegistrar(): RegionModelRegistrar
    {
        return app(RegionModelRegistrar::class);
    }

    public static function getDonorModel(): Model
    {
        return app(DonorModelRegistrar::class)->getModel();
    }

    public static function jobRoute(): void
    {
        Routes::job();
    }

    public static function degreeRoute(): void
    {
        Routes::degree();
    }

    public static function regionRoute(): void
    {
        Routes::region();
    }

    public static function maritalStatusRoute(): void
    {
        Routes::maritalStatus();
    }

    public static function donorRoute(): void
    {
        Routes::donor();
    }
}

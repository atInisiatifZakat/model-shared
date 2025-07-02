<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared;

use Illuminate\Database\Eloquent\Model;
use Inisiatif\ModelShared\Models\Donation;
use Inisiatif\ModelShared\Registrars\JobModelRegistrar;
use Inisiatif\ModelShared\Registrars\BankModelRegistrar;
use Inisiatif\ModelShared\Registrars\DonorModelRegistrar;
use Inisiatif\ModelShared\Registrars\DegreeModelRegistrar;
use Inisiatif\ModelShared\Registrars\DonationModelRegistrar;
use Inisiatif\ModelShared\Registrars\RegionModelRegistrar;
use Inisiatif\ModelShared\Registrars\DonorPhoneModelRegistrar;
use Inisiatif\ModelShared\Registrars\FundingModelRegistrar;
use Inisiatif\ModelShared\Registrars\MaritalStatusModelRegistrar;
use Inisiatif\ModelShared\Registrars\PartnerModelRegistrar;
use Inisiatif\ModelShared\Registrars\ProgramModelRegistrar;
use Inisiatif\ModelShared\Registrars\AccountModelRegistrar;
use Inisiatif\ModelShared\Registrars\FundingSourceModelRegistrar;
use Inisiatif\ModelShared\Registrars\BeneficiaryTypeModelRegistrar;


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
    // Get Donation Model
    public static function getDonationModel(): Model
    {
        return self::getDonationModelRegistrar()->getDonationModel();
    }

    public static function getDonationDetailModel(): Model
    {
        return self::getDonationModelRegistrar()->getDonationDetailModel();
    }

    protected static function getDonationModelRegistrar(): DonationModelRegistrar
    {
        return app(DonationModelRegistrar::class);
    }
    // Get Funding Model
    public static function getFundingCategoryModel(): Model
    {
        return self::getFundingModelRegistrar()->getFundingCategoryModel();
    }

    public static function getFundingTypeModel(): Model
    {
        return self::getFundingModelRegistrar()->getFundingTypeModel();
    }

    protected static function getFundingModelRegistrar(): FundingModelRegistrar
    {
        return app(FundingModelRegistrar::class);
    }
    // Get Program Model
    public static function getProgramModel(): Model
    {
        return self::getProgramModelRegistrar()->getProgramModel();
    }

    public static function getProgramCategoryModel(): Model
    {
        return self::getProgramModelRegistrar()->getProgramCategoryModel();
    }

    public static function getSubProgramCategoryModel(): Model
    {
        return self::getProgramModelRegistrar()->getSubProgramCategoryModel();
    }

    protected static function getProgramModelRegistrar(): ProgramModelRegistrar
    {
        return app(ProgramModelRegistrar::class);
    }

    public static function getPartnerModel(): Model
    {
        return app(PartnerModelRegistrar::class)->getModel();
    }

    public static function getDonorModel(): Model
    {
        return app(DonorModelRegistrar::class)->getModel();
    }

    public static function getDonorPhoneModel(): Model
    {
        return app(DonorPhoneModelRegistrar::class)->getModel();
    }

    public static function getBankModel(): Model
    {
        return app(BankModelRegistrar::class)->getModel();
    }

    public static function getFundingSourceModel(): Model
    {
        return app(FundingSourceModelRegistrar::class)->getModel();
    }

    public static function getBeneficiaryTypeModel(): Model
    {
        return app(BeneficiaryTypeModelRegistrar::class)->getModel();
    }
    
    public static function getAccountModel(): Model
    {
        return app(AccountModelRegistrar::class)->getModel();
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

    public static function bankRoute(): void
    {
        Routes::bank();
    }

    public static function fundingRoute(): void
    {
        Routes::funding();
    }

    public static function programRoute(): void
    {
        Routes::program();
    }

    public static function partnerRoute(): void
    {
        Routes::partner();
    }
}

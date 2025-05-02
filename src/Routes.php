<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared;

use Illuminate\Support\Facades\Route;
use Inisiatif\ModelShared\Http\Controllers\FetchJobOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchBankOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchCityOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchDonorDetailController;
use Inisiatif\ModelShared\Http\Controllers\FetchDonorOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchDegreeOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchRegionSearchController;
use Inisiatif\ModelShared\Http\Controllers\FetchCountryOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchVillageOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchDistrictOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchDonationDetailOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchDonationOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchFundingCategoryController;
use Inisiatif\ModelShared\Http\Controllers\FetchFundingTypeOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchProvinceOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchMaritalStatusOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchPartnerOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchProgramCategoryOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchProgramOptionController;
use Inisiatif\ModelShared\Http\Controllers\FetchSubProgramCategoryOptionController;

final class Routes
{
    public static function job(): void
    {
        Route::get('/options/job', FetchJobOptionController::class);
    }

    public static function degree(): void
    {
        Route::get('/options/degree', FetchDegreeOptionController::class);
    }

    public static function region(): void
    {
        Route::get('/options/region/search', FetchRegionSearchController::class);

        Route::get('/options/countries', FetchCountryOptionController::class);
        Route::get('/options/provinces', FetchProvinceOptionController::class);
        Route::get('/options/cities', FetchCityOptionController::class);
        Route::get('/options/districts', FetchDistrictOptionController::class);
        Route::get('/options/villages', FetchVillageOptionController::class);
    }

    public static function maritalStatus(): void
    {
        Route::get('/options/marital-status', FetchMaritalStatusOptionController::class);
    }

    public static function donor(): void
    {
        Route::get('/options/donor', FetchDonorOptionController::class);
        Route::get('/options/donor/{donorId}', FetchDonorDetailController::class);
    }

    public static function bank(): void
    {
        Route::get('/options/bank', FetchBankOptionController::class);
    }

    public static function donation(): void
    {
        Route::get('/options/donation', FetchDonationOptionController::class);
        Route::get('/options/donation/detail', FetchDonationDetailOptionController::class);
    }

    public static function funding(): void
    {
        Route::get('/options/funding-type', FetchFundingTypeOptionController::class);
        Route::get('/options/funding-category', FetchFundingCategoryController::class);
    }

    public static function program(): void
    {
        Route::get('/options/program', FetchProgramOptionController::class);
        Route::get('/options/program-category', FetchProgramCategoryOptionController::class);
        Route::get('/options/sub-program-category', FetchSubProgramCategoryOptionController::class);
    }

    public static function partner(): void
    {
        Route::get('/options/partner', FetchPartnerOptionController::class);
    }
}

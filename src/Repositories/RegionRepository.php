<?php

declare(strict_types=1);

namespace Inisiatif\ModelShared\Repositories;

use Illuminate\Pagination\CursorPaginator;
use Inisiatif\ModelShared\ModelShared;

final class RegionRepository
{
    private const PATTERN_PROVINCE = '/p:(.*?)( k:| kc:| kl:|$)/';
    private const PATTERN_CITY = '/k:(.*?)( p:| kc:| kl:|$)/';
    private const PATTERN_DISTRICT = '/kc:(.*?)( p:| k:| kl:|$)/';
    private const PATTERN_VILLAGE = '/kl:(.*?)( p:| k:| kc:|$)/';

    public function fetchSearchOptions(string $q): CursorPaginator
    {
        $provinceName = $this->extractName(self::PATTERN_PROVINCE, $q);
        $cityName = $this->extractName(self::PATTERN_CITY, $q);
        $districtName = $this->extractName(self::PATTERN_DISTRICT, $q);
        $villageName = $this->extractName(self::PATTERN_VILLAGE, $q);

        $villages = ModelShared::getVillageModel()
            ->newQuery()
            ->with('district.city.province')
            ->when($provinceName, function ($query) use ($provinceName) {
                $query->whereHas('district.city.province', function ($query) use ($provinceName) {
                    $query->where('name', 'ILIKE', "%{$provinceName}%");
                });
            })
            ->when($cityName, function ($query) use ($cityName) {
                $query->whereHas('district.city', function ($query) use ($cityName) {
                    $query->where('name', 'ILIKE', "%{$cityName}%");
                });
            })
            ->when($districtName, function ($query) use ($districtName) {
                $query->whereHas('district', function ($query) use ($districtName) {
                    $query->where('name', 'ILIKE', "%{$districtName}%");
                });
            })
            ->when($villageName, function ($query) use ($villageName) {
                $query->where('name', 'ILIKE', "%{$villageName}%");
            })
            ->cursorPaginate()->withQueryString();


        return $villages;
    }

    private function extractName(string $pattern, string $q): string
    {
        preg_match($pattern, $q, $matches);
        return  strtolower(trim($matches[1] ?? ''));
    }
}

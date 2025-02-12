<?php

namespace App\Checkers\CheckBlocks;

use App\Checkers\CheckBlocks\Abstracts\AbstractCheckBlock;
use App\Checkers\CheckBlocks\Abstracts\SelectableItemCheckerInterface;
use App\Checkers\CheckTypes\EquallyCheckType;
use App\Checkers\CheckTypes\NotEquallyCheckType;
use App\Models\Agency;
use App\Models\City;
use App\Models\Hotel;

class CityCheckBlock extends AbstractCheckBlock implements SelectableItemCheckerInterface
{

    public static function getName(): string
    {
        return 'Город';
    }

    public static function getSystemName(): string
    {
        return 'city';
    }

    public static function getCheckTypes(): array
    {
        return [
            EquallyCheckType::class,
            NotEquallyCheckType::class
        ];
    }

    protected function getData(Hotel $hotel, Agency $agency): int
    {
        return $hotel->city->id;
    }

    public static function getSelects(): array
    {
        return City::all(['id', 'name'])->toArray();
    }

}

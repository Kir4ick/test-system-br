<?php

namespace App\Checkers\CheckBlocks;

use App\Checkers\CheckBlocks\Abstracts\AbstractCheckBlock;
use App\Checkers\CheckBlocks\Abstracts\SelectableItemCheckerInterface;
use App\Checkers\CheckTypes\EquallyCheckType;
use App\Checkers\CheckTypes\NotEquallyCheckType;
use App\Models\Agency;
use App\Models\Country;
use App\Models\Hotel;

class CountryCheckBlock extends AbstractCheckBlock implements SelectableItemCheckerInterface
{

    public static function getName(): string
    {
        return 'Страна';
    }

    public static function getSystemName(): string
    {
        return 'country';
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
        return $hotel->city->country->id;
    }

    public static function getSelects(): array
    {
        return Country::all(['id', 'name'])->toArray();
    }

}

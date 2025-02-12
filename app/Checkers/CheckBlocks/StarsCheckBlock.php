<?php

namespace App\Checkers\CheckBlocks;

use App\Checkers\CheckBlocks\Abstracts\AbstractCheckBlock;
use App\Checkers\CheckTypes\EquallyCheckType;
use App\Checkers\CheckTypes\NotEquallyCheckType;
use App\Models\Agency;
use App\Models\Hotel;

class StarsCheckBlock extends AbstractCheckBlock
{

    public static function getName(): string
    {
        return 'Звёздность отеля';
    }

    public static function getSystemName(): string
    {
        return 'stars';
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
        return $hotel->stars;
    }

}

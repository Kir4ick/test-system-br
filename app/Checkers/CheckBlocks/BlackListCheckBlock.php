<?php

namespace App\Checkers\CheckBlocks;

use App\Checkers\CheckBlocks\Abstracts\AbstractCheckBlock;
use App\Checkers\CheckBlocks\Abstracts\BooleanValueCheckTypeInterface;
use App\Checkers\CheckTypes\EquallyCheckType;
use App\Models\Agency;
use App\Models\Hotel;
use App\Traits\HasAgencyHotelOptions;

class BlackListCheckBlock extends AbstractCheckBlock implements BooleanValueCheckTypeInterface
{

    use HasAgencyHotelOptions;

    protected function getData(Hotel $hotel, Agency $agency): array
    {
        return $this->getValue($hotel, $agency, 'is_black');
    }

    public static function getName(): string
    {
        return 'В черном списке';
    }

    public static function getSystemName(): string
    {
        return 'blacklist';
    }

    public static function getCheckTypes(): array
    {
        return [
            EquallyCheckType::class
        ];
    }

}

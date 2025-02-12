<?php

namespace App\Checkers\CheckBlocks;

use App\Checkers\CheckBlocks\Abstracts\AbstractCheckBlock;
use App\Checkers\CheckBlocks\Abstracts\BooleanValueCheckTypeInterface;
use App\Checkers\CheckTypes\EquallyCheckType;
use App\Models\Agency;
use App\Models\Hotel;
use App\Traits\HasAgencyHotelOptions;

class WhiteListCheckBlock extends AbstractCheckBlock implements BooleanValueCheckTypeInterface
{

    use HasAgencyHotelOptions;

    protected function getData(Hotel $hotel, Agency $agency): mixed
    {
        return $this->getValue($hotel, $agency, 'is_white');
    }

    public static function getName(): string
    {
        return 'В белом списке';
    }

    public static function getSystemName(): string
    {
        return 'white_list';
    }

    public static function getCheckTypes(): array
    {
        return [
            EquallyCheckType::class
        ];
    }

}

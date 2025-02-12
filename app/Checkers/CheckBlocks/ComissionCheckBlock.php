<?php

namespace App\Checkers\CheckBlocks;

use App\Checkers\CheckBlocks\Abstracts\AbstractCheckBlock;
use App\Checkers\CheckTypes\EquallyCheckType;
use App\Checkers\CheckTypes\LessCheckType;
use App\Checkers\CheckTypes\MoreCheckType;
use App\Checkers\CheckTypes\NotEquallyCheckType;
use App\Models\Agency;
use App\Models\Hotel;
use App\Models\HotelAgreement;

class ComissionCheckBlock extends AbstractCheckBlock
{

    protected function getData(Hotel $hotel, Agency $agency): mixed
    {
        $discountPercents = $hotel->hotelAgreements->map(
            fn (HotelAgreement $hotelAgreement) => $hotelAgreement->discount_percent
        );

        $comissionPercent = $hotel->hotelAgreements->map(
            fn (HotelAgreement $hotelAgreement) => $hotelAgreement->comission_percent
        );

        return array_merge($comissionPercent->toArray(), $discountPercents->toArray());
    }

    public static function getName(): string
    {
        return 'Комиссия или скидка';
    }

    public static function getSystemName(): string
    {
        return 'comission';
    }

    public static function getCheckTypes(): array
    {
        return [
            EquallyCheckType::class,
            LessCheckType::class,
            MoreCheckType::class,
            NotEquallyCheckType::class
        ];
    }

}

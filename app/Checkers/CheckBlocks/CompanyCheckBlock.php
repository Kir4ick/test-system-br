<?php

namespace App\Checkers\CheckBlocks;

use App\Checkers\CheckBlocks\Abstracts\AbstractCheckBlock;
use App\Checkers\CheckBlocks\Abstracts\SelectableItemCheckerInterface;
use App\Checkers\CheckTypes\EquallyCheckType;
use App\Checkers\CheckTypes\NotEquallyCheckType;
use App\Models\Agency;
use App\Models\Company;
use App\Models\Hotel;
use App\Models\HotelAgreement;

class CompanyCheckBlock extends AbstractCheckBlock implements SelectableItemCheckerInterface
{

    protected function getData(Hotel $hotel, Agency $agency): array
    {
        return $hotel->hotelAgreements->map(
            fn (HotelAgreement $agreement) => $agreement->company_id
        )->toArray();
    }

    public static function getName(): string
    {
        return 'Компания';
    }

    public static function getSystemName(): string
    {
        return 'company';
    }

    public static function getCheckTypes(): array
    {
        return [
            EquallyCheckType::class,
            NotEquallyCheckType::class
        ];
    }

    public static function getSelects(): array
    {
        return Company::all(['id', 'name'])->toArray();
    }

}

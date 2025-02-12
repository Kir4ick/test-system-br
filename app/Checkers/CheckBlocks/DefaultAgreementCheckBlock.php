<?php

namespace App\Checkers\CheckBlocks;

use App\Checkers\CheckBlocks\Abstracts\AbstractCheckBlock;
use App\Checkers\CheckBlocks\Abstracts\BooleanValueCheckTypeInterface;
use App\Models\Agency;
use App\Models\Hotel;
use App\Models\HotelAgreement;

class DefaultAgreementCheckBlock extends AbstractCheckBlock implements BooleanValueCheckTypeInterface
{

    protected function getData(Hotel $hotel, Agency $agency): array
    {
        return $hotel->hotelAgreements->map(
            fn (HotelAgreement $agreement) => $agreement->is_default
        )->toArray();
    }

    public static function getName(): string
    {
        return 'Договор по умолчанию';
    }

    public static function getSystemName(): string
    {
        return 'agreement_default';
    }

    public static function getCheckTypes(): array
    {
        return [];
    }

}

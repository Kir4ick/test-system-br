<?php

namespace App\Traits;

use App\Models\Agency;
use App\Models\Hotel;

trait HasAgencyHotelOptions
{
    protected function getValue(Hotel $hotel, Agency $agency, string $field): array
    {
        return $hotel->agencies
            ->filter(
                fn (Agency $agencyInList) => $agencyInList->id === $agency->id
            )
            ->map(
                fn (Agency $agencyInList) => $agencyInList->pivot->$field
            )->toArray();
    }
}

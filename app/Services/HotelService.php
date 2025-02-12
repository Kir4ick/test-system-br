<?php

namespace App\Services;

use App\Checkers\HotelChecker;
use App\Models\Agency;
use App\Models\Hotel;
use Illuminate\Support\LazyCollection;

class HotelService
{

    public function __construct(
        private HotelChecker $hotelChecker,
    ) {}

    public function check(int $hotelId): array
    {
        $agencyMessages = [];

        /** @var Hotel $hotel */
        $hotel = Hotel::query()
            ->with(['hotelAgreements', 'agencies', 'city', 'city.country', 'hotelAgreements.company'])
            ->find($hotelId);

        foreach ($this->getAgencies() as $agency) {
            $ruleList = $agency->rules()->where('is_active', true)->get();
            $result = $this->hotelChecker->check($agency, $hotel, $ruleList);

            if ($result) {
                $agencyMessages[$agency->name] = $result;
            }
        }

        return $agencyMessages;
    }

    /**
     * @return LazyCollection<Agency>
     */
    private function getAgencies(): iterable
    {
        return Agency::query()->cursor();
    }
}

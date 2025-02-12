<?php

namespace App\Checkers;

use App\Checkers\CheckBlocks\Resolver\BlockResolver;
use App\Checkers\CheckTypes\Resolver\CheckTypeResolver;
use App\Models\Agency;
use App\Models\Hotel;
use App\Models\Rule;
use \Illuminate\Support\Collection;

class HotelChecker
{

    public function __construct(
        private BlockResolver $blockResolver,
        private CheckTypeResolver $checkTypeResolver,
    )
    {}

    /**
     * Проверка отеля по правилам агенства
     *
     * @param Agency $agency
     * @param Hotel $hotel
     * @param Collection<Rule> $ruleList
     *
     * @return array
     */
    public function check(Agency $agency, Hotel $hotel, Collection $ruleList): array
    {
        $result = [];

        foreach ($ruleList as $rule) {
            foreach ($rule->conditions as $condition) {
                $block = $this->blockResolver->resolve($condition, $hotel, $agency);
                $checkType = $this->checkTypeResolver->resolve($condition->condition);

                if (!$block || !$checkType) {
                    continue;
                }

                $checkResult = $block->check($condition->value, $checkType);
                if (!$checkResult) {
                    continue 2;
                }
            }

            $result[$rule->id] = sprintf('%s (%s)', $rule->message, $agency->name);
        }

        return $result;
    }

}

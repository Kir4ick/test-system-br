<?php

namespace App\Checkers\CheckBlocks\Resolver;

use App\Checkers\CheckBlocks\Abstracts\AbstractCheckBlock;
use App\Checkers\CheckBlocks\BlackListCheckBlock;
use App\Checkers\CheckBlocks\CityCheckBlock;
use App\Checkers\CheckBlocks\ComissionCheckBlock;
use App\Checkers\CheckBlocks\CompanyCheckBlock;
use App\Checkers\CheckBlocks\CountryCheckBlock;
use App\Checkers\CheckBlocks\DefaultAgreementCheckBlock;
use App\Checkers\CheckBlocks\RecommendationCheckBlock;
use App\Checkers\CheckBlocks\StarsCheckBlock;
use App\Checkers\CheckBlocks\WhiteListCheckBlock;
use App\Models\Agency;
use App\Models\Condition;
use App\Models\Hotel;
use App\Models\Rule;

class BlockResolver
{
    private array $checkBlocks;

    public function __construct()
    {
        $this->checkBlocks = $this->prepareBlocks();
    }

    /**
     * @return class-string<AbstractCheckBlock>[]
     */
    public function getCheckBlocks(): array
    {
        return [
            BlackListCheckBlock::class,
            CityCheckBlock::class,
            ComissionCheckBlock::class,
            CompanyCheckBlock::class,
            CountryCheckBlock::class,
            DefaultAgreementCheckBlock::class,
            RecommendationCheckBlock::class,
            StarsCheckBlock::class,
            WhiteListCheckBlock::class
        ];
    }

    private function prepareBlocks(): array
    {
        $checkTypes = [];
        foreach ($this->getCheckBlocks() as $checkType) {
            $checkTypes[$checkType::getSystemName()] = $checkType;
        }

        return $checkTypes;
    }

    public function resolve(Condition $condition, Hotel $hotel, Agency $agency): ?AbstractCheckBlock
    {
        if (isset($this->checkBlocks[$condition->name])) {
            return new $this->checkBlocks[$condition->name]($hotel, $agency);
        }

        return null;
    }
}

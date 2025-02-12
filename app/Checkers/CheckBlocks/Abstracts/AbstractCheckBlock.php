<?php

namespace App\Checkers\CheckBlocks\Abstracts;

use App\Checkers\CheckTypes\Abstracts\CheckTypeInterface;
use App\Models\Agency;
use App\Models\Hotel;

abstract class AbstractCheckBlock implements ItemCheckerInterface
{
    public function __construct(
        private Hotel $hotel,
        private Agency $agency,
    )
    {}

    /**
     * Данные для блока
     *
     * @param Hotel $hotel
     * @param Agency $agency
     *
     * @return mixed
     */
    abstract protected function getData(Hotel $hotel, Agency $agency): mixed;

    /**
     * @inheritdoc
     */
    public function check($value, CheckTypeInterface $checkType): bool
    {
        $data = $this->getData($this->hotel, $this->agency);

        if (!is_array($data)) {
            $data = [$data];
        }

        if (!is_array($value)) {
            $value = [$value];
        }

        foreach ($data as $item) {
            foreach ($value as $valueItem) {
                $checkResult = $checkType->check($item, $valueItem);
                if ($checkResult) {
                    return true;
                }
            }
        }

        return false;
    }

}

<?php

namespace App\Checkers\CheckTypes;

use App\Checkers\CheckTypes\Abstracts\CheckTypeInterface;

class MoreCheckType implements CheckTypeInterface
{

    public static function getType(): string
    {
        return '>';
    }

    public function check($data, $value): bool
    {
        return $data > $value;
    }

}

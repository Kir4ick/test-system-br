<?php

namespace App\Checkers\CheckTypes;

use App\Checkers\CheckTypes\Abstracts\CheckTypeInterface;

class NotEquallyCheckType implements CheckTypeInterface
{

    public static function getType(): string
    {
        return '!=';
    }

    public function check($data, $value): bool
    {
        return $data != $value;
    }

}

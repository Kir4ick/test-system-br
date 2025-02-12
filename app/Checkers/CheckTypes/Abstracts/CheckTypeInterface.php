<?php

namespace App\Checkers\CheckTypes\Abstracts;

interface CheckTypeInterface
{
    public static function getType(): string;

    public function check($data, $value): bool;
}

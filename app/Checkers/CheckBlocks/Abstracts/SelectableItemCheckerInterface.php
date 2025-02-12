<?php

namespace App\Checkers\CheckBlocks\Abstracts;

/**
 * Интерфейс для блоков, которые будут типа select в интерфейсе
 */
interface SelectableItemCheckerInterface
{
    public static function getSelects(): array;

}

<?php

namespace App\Checkers\CheckBlocks\Abstracts;

use App\Checkers\CheckTypes\Abstracts\CheckTypeInterface;

interface ItemCheckerInterface
{

    /**
     * Имя блока в интерфейсе
     *
     * @return string
     */
    public static function getName(): string;

    /**
     * Системное имя блока
     *
     * @return string
     */
    public static function getSystemName(): string;

    /**
     * Типы выбора (в интерфейсе select)
     *
     * @return class-string<CheckTypeInterface>[]
     */
    public static function getCheckTypes(): array;

    /**
     * Проверка в блоке
     *
     * @param $value
     * @param CheckTypeInterface $checkType
     *
     * @return bool
     */
    public function check($value, CheckTypeInterface $checkType): bool;
}

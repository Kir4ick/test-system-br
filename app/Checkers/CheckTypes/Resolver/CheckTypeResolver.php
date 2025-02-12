<?php

namespace App\Checkers\CheckTypes\Resolver;

use App\Checkers\CheckTypes\Abstracts\CheckTypeInterface;
use App\Checkers\CheckTypes\EquallyCheckType;
use App\Checkers\CheckTypes\LessCheckType;
use App\Checkers\CheckTypes\MoreCheckType;
use App\Checkers\CheckTypes\NotEquallyCheckType;

class CheckTypeResolver
{

    private array $checkTypes;

    public function __construct()
    {
        $this->checkTypes = $this->prepareTypes();
    }

    /**
     * @return class-string<CheckTypeInterface>[]
     */
    public function getCheckTypes(): array
    {
        return [
            EquallyCheckType::class,
            LessCheckType::class,
            MoreCheckType::class,
            NotEquallyCheckType::class,
        ];
    }

    private function prepareTypes(): array
    {
        $checkTypes = [];
        foreach ($this->getCheckTypes() as $checkType) {
            $checkTypes[$checkType::getType()] = $checkType;
        }

        return $checkTypes;
    }

    public function resolve(string $type): ?CheckTypeInterface
    {
        if (isset($this->checkTypes[$type])) {
            return new $this->checkTypes[$type]();
        }

        return null;
    }
}

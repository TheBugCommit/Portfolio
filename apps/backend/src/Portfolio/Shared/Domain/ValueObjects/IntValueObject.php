<?php

declare(strict_types=1);

namespace App\Portfolio\Shared\Domain\ValueObjects;

abstract class IntValueObject
{
    public function __construct(protected int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }
}
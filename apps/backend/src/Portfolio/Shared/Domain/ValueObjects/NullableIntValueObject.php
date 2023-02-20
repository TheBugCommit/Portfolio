<?php

declare(strict_types=1);

namespace App\Portfolio\Shared\Domain\ValueObjects;

abstract class NullableIntValueObject
{
    protected int $value;

    public function value(): ?int
    {
        return $this->value;
    }
}
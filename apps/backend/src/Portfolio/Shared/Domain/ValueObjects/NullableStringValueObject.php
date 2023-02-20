<?php

declare(strict_types=1);

namespace App\Portfolio\Shared\Domain\ValueObjects;

abstract class NullableStringValueObject
{
    protected string $value;

    public function value(): ?string
    {
        return $this->value;
    }
}
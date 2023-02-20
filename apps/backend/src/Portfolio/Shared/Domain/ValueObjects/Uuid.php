<?php

declare(strict_types=1);

namespace App\Portfolio\Shared\Domain\ValueObjects;

use http\Exception\InvalidArgumentException;
use Stringable;
use Symfony\Component\Uid\Uuid as SymUuid;

class Uuid implements Stringable
{
    public function __construct(protected string $value)
    {
        $this->isValid($this->value);
    }

    public static function generate(): string
    {
        return SymUuid::v7()->toRfc4122();
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(Uuid $other): bool
    {
        return $this->value() === $other->value();
    }

    public function __toString(): string
    {
        return $this->value();
    }

    private function isValid(string $uuid): void
    {
        if(!SymUuid::isValid($uuid))
        {
            throw new InvalidArgumentException("Uuid it's invalid");
        }
    }
}
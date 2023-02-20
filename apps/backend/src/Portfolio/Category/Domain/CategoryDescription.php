<?php

declare(strict_types=1);

namespace App\Portfolio\Category\Domain;

use App\Portfolio\Shared\Domain\ValueObjects\NullableStringValueObject;
use Symfony\Component\String\Exception\InvalidArgumentException;

class CategoryDescription extends NullableStringValueObject
{
    public function __construct(?string $value)
    {
        if($value !== null && strlen($value) > 100)
        {
            throw new InvalidArgumentException("Invalid Category Description");
        }

        $this->value = $value;
    }
}
<?php

declare(strict_types=1);

namespace App\Portfolio\Category\Domain;

use App\Portfolio\Shared\Domain\ValueObjects\StringValueObject;
use Symfony\Component\String\Exception\InvalidArgumentException;

class CategoryIcon extends StringValueObject
{
    public function __construct(string $value)
    {
        if(strlen($value) > 100 || strlen($value) <= 0)
        {
            throw new InvalidArgumentException("Invalid Category Icon");
        }

        $this->value = $value;
    }
}
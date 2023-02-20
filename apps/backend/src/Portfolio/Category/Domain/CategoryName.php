<?php

declare(strict_types=1);

namespace App\Portfolio\Category\Domain;

use App\Portfolio\Shared\Domain\ValueObjects\StringValueObject;
use Symfony\Component\String\Exception\InvalidArgumentException;

class CategoryName extends StringValueObject
{
    public function __construct(string $value)
    {
        if(strlen($value) <= 0 || strlen($value) > 20)
        {
            throw new InvalidArgumentException("Invalid Category Name");
        }

        $this->value = $value;
    }
}
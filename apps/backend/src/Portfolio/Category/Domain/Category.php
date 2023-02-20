<?php

declare(strict_types=1);

namespace App\Portfolio\Category\Domain;

class Category
{
    public function __construct(
        private readonly CategoryId $id,
        private CategoryName $name,
        private CategoryIcon $icon,
        private CategoryDescription $description
    ){}

    public static function create(CategoryId $id, CategoryName $name, CategoryIcon $icon, CategoryDescription $description): self
    {
        return new self($id, $name, $icon, $description);
    }

    /**
     * @return CategoryId
     */
    public function id(): CategoryId
    {
        return $this->id;
    }

    /**
     * @return CategoryName
     */
    public function name(): CategoryName
    {
        return $this->name;
    }

    /**
     * @return CategoryDescription
     */
    public function description(): CategoryDescription
    {
        return $this->description;
    }

    /**
     * @return CategoryIcon
     */
    public function icon(): CategoryIcon
    {
        return $this->icon;
    }

    /**
     * @param CategoryName $name
     */
    public function setName(CategoryName $name): void
    {
        $this->name = $name;
    }

    /**
     * @param CategoryDescription $description
     */
    public function setDescription(CategoryDescription $description): void
    {
        $this->description = $description;
    }

    /**
     * @param CategoryIcon $icon
     */
    public function setIcon(CategoryIcon $icon): void
    {
        $this->icon = $icon;
    }
}
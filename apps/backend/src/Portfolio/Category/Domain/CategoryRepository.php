<?php

declare(strict_types=1);

namespace App\Portfolio\Category\Domain;

interface CategoryRepository
{
    public function save(Category $category) : void;
    public function remove(Category $category) : void;
    public function findOneById(CategoryId $id) : ?Category;
}
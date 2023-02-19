<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\Category;

class CategoryRepository extends DoctrineBaseRepository
{
    public function save(Category $category) : void
    {
        $this->saveEntity($category);
    }

    public function remove(Category $category) : void
    {
        $this->removeEntity($category);
    }

    public function findOneById(string $id) : ?Category
    {
        return $this->repository->find($id);
    }

    protected static function entityClass(): string
    {
        return Category::class;
    }
}
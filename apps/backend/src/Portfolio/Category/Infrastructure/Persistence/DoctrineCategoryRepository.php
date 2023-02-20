<?php

declare(strict_types=1);

namespace App\Portfolio\Category\Infrastrocture\Persistence;

use App\Portfolio\Category\Domain\Category;
use App\Portfolio\Category\Domain\CategoryId;
use App\Portfolio\Category\Domain\CategoryRepository;
use App\Portfolio\Shared\Infrastrocture\Persistence\Doctrine\DoctrineRepository;

class DoctrineCategoryRepository extends DoctrineRepository implements CategoryRepository
{
    public function save(Category $category) : void
    {
        $this->persist($category);
    }

    public function remove(Category $category) : void
    {
        $this->delete($category);
    }

    public function findOneById(CategoryId $id) : ?Category
    {
        return $this->repository->find($id->value());
    }

    protected static function entityClass(): string
    {
        return Category::class;
    }
}
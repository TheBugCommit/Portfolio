<?php

declare(strict_types=1);

namespace App\Services;

use App\Entity\Category;
use App\Repository\CategoryRepository;

class UpdateCategoryService
{
    public function __construct(private readonly CategoryRepository $categoryRepository)
    {
    }

    public function __invoke(string $id, string $name, string $icon, ?string $description) : Category
    {
        $category = $this->categoryRepository->findOneById($id);

        if($category instanceof Category)
        {
            $category->setName($name);
            $category->setIcon($icon);
            $category->setDescription($description);

            $this->categoryRepository->save($category);
        }

        return $category;
    }
}
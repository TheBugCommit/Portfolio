<?php

declare(strict_types=1);

namespace App\Services;

use App\Entity\Category;
use App\Repository\CategoryRepository;

class CreateCategoryService
{
    public function __construct(private readonly CategoryRepository $categoryRepository)
    {
    }

    public function __invoke(string $name, string $icon, ?string $description) : Category
    {
        $category = new Category($name, $icon, $description);

        $this->categoryRepository->save($category);

        return $category;
    }
}
<?php

declare(strict_types=1);

namespace App\Porfolio\Category\Application;

use App\Portfolio\Category\Domain\Category;
use App\Portfolio\Category\Domain\CategoryDescription;
use App\Portfolio\Category\Domain\CategoryIcon;
use App\Portfolio\Category\Domain\CategoryId;
use App\Portfolio\Category\Domain\CategoryName;
use App\Portfolio\Category\Domain\CategoryRepository;

final class CreateCategory
{
    public function __construct(private readonly CategoryRepository $categoryRepository) {}

    public function __invoke(string $name, string $icon, ?string $description): Category
    {
        $id              = new CategoryId(CategoryId::generate());
        $name            = new CategoryName($name);
        $icon            = new CategoryIcon($icon);
        $description     = new CategoryDescription($description);

        $category = Category::create($id, $name, $icon, $description);
        $this->categoryRepository->save($category);

        return $category;
    }
}
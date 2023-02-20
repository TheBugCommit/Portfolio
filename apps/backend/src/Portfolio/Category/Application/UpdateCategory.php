<?php

declare(strict_types=1);

namespace App\Porfolio\Category\Application;

use App\Portfolio\Category\Domain\Category;
use App\Portfolio\Category\Domain\CategoryDescription;
use App\Portfolio\Category\Domain\CategoryIcon;
use App\Portfolio\Category\Domain\CategoryId;
use App\Portfolio\Category\Domain\CategoryName;
use App\Portfolio\Category\Domain\CategoryRepository;

final class UpdateCategory
{
    public function __construct(private readonly CategoryRepository $categoryRepository) {}

    public function __invoke(string $id, string $name, string $icon, ?string $description): Category
    {
        $id              = new CategoryId($id);
        $name            = new CategoryName($name);
        $icon            = new CategoryIcon($icon);
        $description     = new CategoryDescription($description);

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
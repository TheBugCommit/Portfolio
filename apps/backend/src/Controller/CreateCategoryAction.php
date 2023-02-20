<?php

declare(strict_types=1);

namespace App\Controller;

use App\Porfolio\Category\Application\CreateCategory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateCategoryAction
{
    public function __construct(private readonly CreateCategory $createCategory) {}

    public function __invoke(Request $request) : JsonResponse
    {
        $name        = (string) $request->request->get("name");
        $icon        = (string) $request->request->get("icon");
        $description = (string) $request->request->get("description");

        $category = $this->createCategory->__invoke($name, $icon, $description);

        return new JsonResponse(
            [
                'id'            =>  $category->id(),
                'name'          =>  $category->name(),
                'icon'          =>  $category->icon(),
                'description'   =>  $category->description()
            ],
            Response::HTTP_OK,
            ['Access-Control-Allow-Origin' => '*']
        );
    }
}
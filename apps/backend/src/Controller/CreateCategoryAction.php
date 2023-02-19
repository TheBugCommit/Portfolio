<?php

declare(strict_types=1);

namespace App\Controller;

use App\Services\CreateCategoryService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CreateCategoryAction
{
    public function __construct(private readonly CreateCategoryService $createCategoryService)
    {
    }

    public function __invoke(Request $request) : JsonResponse
    {
        $name = $request->request->get("name");
        $icon = $request->request->get("icon");
        $description = $request->request->get("description");

        $category = $this->createCategoryService->__invoke(
            null === $name ? null : (string) $name,
            null === $icon ? null : (string) $icon,
            null === $description ? null : (string) $description
        );

        return new JsonResponse(
            [
                'id'            =>  $category->getId(),
                'name'          =>  $category->getName(),
                'icon'          =>  $category->getIcon(),
                'description'   =>  $category->getDescription()
            ],
            Response::HTTP_OK,
            ['Access-Control-Allow-Origin' => '*']
        );
    }
}
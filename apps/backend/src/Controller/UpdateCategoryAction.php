<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class UpdateCategoryAction
{
//    public function __construct(private readonly CategoryUpdater $updateCategoryService)
//    {
//    }
//
//    public function __invoke(Request $request) : JsonResponse
//    {
//        $id = $request->request->get("id");
//        $name = $request->request->get("name");
//        $icon = $request->request->get("icon");
//        $description = $request->request->get("description");
//
//        $category = $this->updateCategoryService->__invoke(
//            null === $id ? null : (string) $id,
//            null === $name ? null : (string) $name,
//            null === $icon ? null : (string) $icon,
//            null === $description ? null : (string) $description
//        );
//
//        return new JsonResponse(
//            [
//                'id'            =>  $category->getId(),
//                'name'          =>  $category->getName(),
//                'icon'          =>  $category->getIcon(),
//                'description'   =>  $category->getDescription()
//            ],
//            Response::HTTP_OK,
//            ['Access-Control-Allow-Origin' => '*']
//        );
//    }
}
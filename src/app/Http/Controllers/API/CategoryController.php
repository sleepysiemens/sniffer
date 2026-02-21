<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Throwable;

class CategoryController extends AbstractAPIController
{
    public function __construct(protected CategoryService $categoryService) {}

    public function index(Request $request): AnonymousResourceCollection|JsonResponse
    {
        try {
            $categories = $this->categoryService->paginate(currPage: (int) $request->query('page'));

            return CategoryResource::collection($categories)->additional(['failed' => false]);
        } catch (Throwable $e) {
            return $this->errorHandle(message: $e->getMessage());
        }
    }

    public function show(int $id): JsonResponse
    {
        try {
            return $this->getSuccessResponse(data: new CategoryResource($this->categoryService->getById($id)));
        } catch (Throwable $e) {
            return $this->errorHandle($e->getMessage());
        }
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            return $this->getSuccessResponse(
                message: "created successfully",
                data: new CategoryResource($this->categoryService->createCategory($data)),
                code: 201
            );
        } catch (Throwable $e) {
            return $this->errorHandle($e->getMessage());
        }
    }

    public function update(int $id, UpdateCategoryRequest $request): JsonResponse
    {
        try {
            return $this->getSuccessResponse(
                message: "updated successfully",
                data: new CategoryResource($this->categoryService->updateCategory($id, $request->validated())),
            );
        } catch (Throwable $e) {
            return $this->errorHandle($e->getMessage());
        }
    }

    public function delete(int $id): JsonResponse
    {
        try {
            $this->categoryService->deleteCategory($id);

            return $this->getSuccessResponse(
                message: "deleted successfully",
            );
        } catch (Throwable $e) {
            return $this->errorHandle($e->getMessage());
        }
    }
}

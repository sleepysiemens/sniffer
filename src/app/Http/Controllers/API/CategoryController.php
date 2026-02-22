<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Services\APICRUDService;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public function __construct(
        protected CategoryService $categoryService,
        protected APICRUDService $apiCrudService,
    ) {}

    public function index(Request $request): AnonymousResourceCollection|JsonResponse
    {
        return $this->apiCrudService->handleAction(function() use ($request) {
            $categories = $this->categoryService->paginate(
                currPage: (int) $request->query('page'),
                onlyAvailable: filter_var($request->query('only_available'), FILTER_VALIDATE_BOOLEAN),
            );

            return CategoryResource::collection($categories)->additional(['failed' => false]);
        });
    }

    public function show(int $id): JsonResource|JsonResponse
    {
        return $this->apiCrudService->handleAction(
            fn() =>
            (new CategoryResource($this->categoryService->getById($id)))
                ->additional(['failed' => false])
        );
    }

    public function store(StoreCategoryRequest $request): JsonResource|JsonResponse
    {
        return $this->apiCrudService->handleAction(function() use ($request) {
            $data = $request->validated();

            return (new CategoryResource($this->categoryService->createCategory($data)))
                ->additional(['failed' => false, 'message' => 'created successfully']);
        });
    }

    public function update(int $id, UpdateCategoryRequest $request): JsonResource|JsonResponse
    {
        return $this->apiCrudService->handleAction(
            fn() =>
            (new CategoryResource($this->categoryService->updateCategory($id, $request->validated())))
                ->additional(['failed' => false, 'message' => 'updated successfully'])
        );
    }

    public function delete(int $id): JsonResponse
    {
        return $this->apiCrudService->handleAction(function() use ($id) {
            $this->categoryService->deleteCategory($id);

            return response()->json(['failed' => false, 'message' => 'deleted successfully']);
        });
    }
}

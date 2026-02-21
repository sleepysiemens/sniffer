<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends AbstractAPIController
{
    public function __construct(protected ProductService $productService) {}

    public function index(Request $request): JsonResponse
    {
        try {
            $products = $this->productService->paginate(currPage: (int) $request->query('page'));

            return $this->getSuccessResponse(data: ProductResource::collection($products));
        } catch (Throwable $e) {
            return $this->errorHandle($e->getMessage());
        }
    }

    public function show(string $id): JsonResponse
    {
        try {
            return $this->getSuccessResponse(data: new ProductResource($this->productService->getById($id)));
        } catch (Throwable $e) {
            return $this->errorHandle($e->getMessage());
        }
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            return $this->getSuccessResponse(
                message: 'created successfully',
                data: new ProductResource($this->productService->createProduct($data)),
                code:  201,
            );
        } catch (Throwable $e) {
            return $this->errorHandle($e->getMessage());
        }
    }

    public function update(string $id, UpdateProductRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            return $this->getSuccessResponse(
                message: 'updated successfully',
                data: new ProductResource($this->productService->updateProduct($id, $data)),
            );
        } catch (Throwable $e) {
            return $this->errorHandle($e->getMessage());
        }
    }

    public function delete(string $id): JsonResponse
    {
        try {
            $this->productService->deleteProduct($id);

            return $this->getSuccessResponse(message: 'deleted successfully');
        } catch (Throwable $e) {
            return $this->errorHandle($e->getMessage());
        }
    }
}

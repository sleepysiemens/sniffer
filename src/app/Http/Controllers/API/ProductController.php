<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Throwable;

class ProductController extends Controller
{
    public function __construct(protected ProductService $productService) {}

    public function index(Request $request): JsonResponse
    {
        try {
            $products = $this->productService->paginate(currPage: (int) $request->query('page'));

            return response()->json(['data' => ProductResource::collection($products)]);
        } catch (Throwable $e) {
            return response()->json([], 500);
        }
    }

    public function show(string $id): JsonResponse
    {
        try {
            return response()->json(['data' => new ProductResource($this->productService->getById($id))]);
        } catch (Throwable $e) {
            return response()->json([], 500);
        }
    }

    public function store(StoreProductRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            return response()->json(['data' => new ProductResource($this->productService->createProduct($data))]);
        } catch (Throwable $e) {
            return response()->json([], 500);
        }
    }

    public function update(string $id, UpdateProductRequest $request): JsonResponse
    {
        try {
            $data = $request->validated();

            return response()->json(['data' => new ProductResource($this->productService->updateProduct($id, $data))]);
        } catch (Throwable $e) {
            return response()->json([], 500);
        }
    }

    public function delete(string $id): JsonResponse
    {
        try {
            $this->productService->deleteProduct($id);

            return response()->json();
        } catch (Throwable $e) {
            return response()->json([], 500);
        }
    }
}

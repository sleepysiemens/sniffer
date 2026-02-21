<?php
declare(strict_types=1);

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Services\APICRUDService;
use App\Services\ProductService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use Throwable;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService,
        protected APICRUDService $apiCrudService
    ) {}

    public function index(Request $request): AnonymousResourceCollection|JsonResponse
    {
        return $this->apiCrudService->handleAction(function() use ($request) {
            $products = $this->productService->paginate(currPage: (int) $request->query('page'));

            return ProductResource::collection($products)->additional(['failed' => false]);
        });
    }

    public function show(string $id): JsonResource|JsonResponse
    {
        return $this->apiCrudService->handleAction(
            fn() =>
            (new ProductResource($this->productService->getById($id)))
                ->additional(['failed' => false])
        );
    }

    public function store(StoreProductRequest $request): JsonResource|JsonResponse
    {
        return $this->apiCrudService->handleAction(function() use ($request) {
            $data = $request->validated();

            return (new ProductResource($this->productService->createProduct($data)))
                ->additional(['failed' => false, 'message' => 'created successfully']);
        });

    }

    public function update(string $id, UpdateProductRequest $request): JsonResource|JsonResponse
    {
        return $this->apiCrudService->handleAction(function() use ($id, $request) {
            $data = $request->validated();

            return (new ProductResource($this->productService->updateProduct($id, $data)))
                ->additional(['failed' => false, 'message' => 'updated successfully']);
        });
    }

    public function delete(string $id): JsonResponse
    {
        return $this->apiCrudService->handleAction(function() use ($id) {
            $this->productService->deleteProduct($id);

            return response()->json(['failed' => false, 'message' => 'deleted successfully']);
        });
    }
}

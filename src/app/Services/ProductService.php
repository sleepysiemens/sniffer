<?php
declare(strict_types=1);

namespace App\Services;

use App\Interfaces\ProductServiceInterface;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;
use Throwable;

class ProductService implements ProductServiceInterface
{
    public const ON_PAGE_COUNT = 15;

    public function __construct(protected ProductFieldService $productFieldService) {}

    public function paginate(int $currPage = 1): LengthAwarePaginator
    {
        return Product::query()
            ->select([
                'id',
                'name',
                'desc',
                'category_id',
                'price',
                'created_at',
            ])
            ->orderByDesc('created_at')
            ->paginate(self::ON_PAGE_COUNT);
    }

    /** @throws Throwable */
    public function getById(string $id): Product
    {
        return Product::query()->findOrFail($id);
    }

    /** @throws Throwable */
    public function createProduct(array $data): Product
    {
        $data['category_id'] = $this->normalizeCategoryId($data['category']);
        $fieldData = Arr::get($data, 'fields');
        Arr::forget($data, ['category', 'fields']);

        $product = Product::query()->create($data);

        if ($fieldData) {
            $fields = $this->generateFields($fieldData);

            $product->fields()->sync($fields);
        }

        return $product;
    }

    /**
     * @throws Throwable
     */
    public function updateProduct(string $id, array $data): Product
    {
        $product = $this->getById($id);

        $data['category_id'] = $this->normalizeCategoryId($data['category']);
        $fieldData = Arr::get($data, 'fields');
        Arr::forget($data, ['category', 'fields']);

        $product->update($data);

        if ($fieldData) {
            $fields = $this->generateFields($fieldData);

            $product->fields()->sync($fields);
        }

        return $product;
    }

    /**
     * @throws Throwable
     */
    public function deleteProduct(string $id): void
    {
        $product = $this->getById($id);
        $product->delete();
    }

    /** @throws Throwable */
    private function normalizeCategoryId(string $categoryData): int
    {
        $category = Category::query()
            ->select(['id', 'slug'])
            ->when(
                is_numeric($categoryData),
                fn(Builder $q) => $q->where('id', $categoryData),
                fn(Builder $q) => $q->where('slug', $categoryData)
            )
            ->firstOrFail();

        return $category->id;
    }

    private function generateFields(array $fieldData): array
    {
        $fieldIds = $this->productFieldService->getIdsBySlug(array_keys($fieldData));
        $fields = [];

        foreach ($fieldIds as $fieldSlug => $fieldId) {
            $fields[$fieldId] = [
                'value' => $fieldData[$fieldSlug],
            ];
        }

        return $fields;
    }
}

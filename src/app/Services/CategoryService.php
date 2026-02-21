<?php

namespace App\Services;

use App\Interfaces\CategoryServiceInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoryService implements CategoryServiceInterface
{
    public const ON_PAGE_COUNT = 15;

    public function paginate(int $currPage = 1): LengthAwarePaginator
    {
        return Category::query()
            ->select([
                'id',
                'slug',
                'name',
                'cover',
                'is_available',
            ])
            ->orderBy('id')
            ->paginate(self::ON_PAGE_COUNT);
    }

    /** @throws ModelNotFoundException */
    public function getById(int $id): Category
    {
        return Category::query()->findOrFail($id);
    }

    public function createCategory(array $data): Category
    {
        return Category::query()->create($data);
    }

    public function updateCategory(int $id, array $data): Category
    {
        $category = $this->getById($id);

        $category->update($data);

        return $category;
    }

    public function deleteCategory(int $id): void
    {
        $category = $this->getById($id);
        $category->delete();
    }
}

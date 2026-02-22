<?php

namespace App\Services;

use App\Interfaces\CategoryServiceInterface;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class CategoryService implements CategoryServiceInterface
{
    public const ON_PAGE_COUNT = 15;

    public function paginate(int $currPage = 1, bool $onlyAvailable = false): LengthAwarePaginator
    {
        $params = [
            'on_page' => self::ON_PAGE_COUNT,
            'page' => $currPage,
            'only_available' => $onlyAvailable,
        ];

        return Cache::tags(['categories_list'])->rememberForever(
            'categories:' . md5(json_encode($params)),
            function () use ($onlyAvailable) {
                return Category::query()
                    ->when($onlyAvailable, fn (Builder $q) => $q->onlyAvailable())
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
        );
    }

    /** @throws ModelNotFoundException */
    public function getById(int $id): Category
    {
        return Cache::tags(['category', 'category:' . $id])->rememberForever(
            'category:' . $id,
            function () use ($id) {
                return Category::query()->findOrFail($id);
            }
        );
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

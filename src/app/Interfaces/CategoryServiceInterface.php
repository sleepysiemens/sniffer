<?php

namespace App\Interfaces;

use App\Models\Category;
use Illuminate\Pagination\LengthAwarePaginator;

interface CategoryServiceInterface
{
    public function paginate(int $currPage = 1): LengthAwarePaginator;
    public function getById(int $id): Category;
    public function createCategory(array $data): Category;
    public function updateCategory(int $id, array $data): Category;
    public function deleteCategory(int $id): void;
}

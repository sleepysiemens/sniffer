<?php
declare(strict_types=1);

namespace App\Interfaces;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

interface ProductServiceInterface
{
    public function paginate(int $currPage = 1): LengthAwarePaginator;
    public function getById(string $id): Product;
    public function createProduct(array $data): Product;
    public function updateProduct(string $id, array $data): Product;
    public function deleteProduct(string $id): void;
}

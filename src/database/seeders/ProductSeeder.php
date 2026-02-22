<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductField;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::query()
            ->select(['slug', 'id'])
            ->get();

        $categoryIds = $categories->pluck('id', 'slug')->toArray();
        $fieldIds = ProductField::query()
            ->select(['id', 'slug'])
            ->withWhereHas('categories', fn (Builder|BelongsToMany $query) => $query->whereIn('categories.id', $categoryIds))
            ->get()
            ->pluck('id', 'slug')
            ->toArray();

        $products = [
            [
                'data' => [
                    'name'        => 'Sniffer classic',
                    'category_id' => $categoryIds['decks'],
                    'price'       => '1200',
                    'amount'      => 3,
                ],
                'fields' => [
                    [
                        'field_id' => $fieldIds['width'],
                        'value' => '32',
                    ],
                    [
                        'field_id' => $fieldIds['length'],
                        'value' => '96',
                    ],
                    [
                        'field_id' => $fieldIds['material'],
                        'value' => 'Клен',
                    ],
                    [
                        'field_id' => $fieldIds['wheelbase'],
                        'value' => '45',
                    ],
                    [
                        'field_id' => $fieldIds['plies_amount'],
                        'value' => '5',
                    ],
                    [
                        'field_id' => $fieldIds['concave'],
                        'value' => 'high',
                    ],
                ],
            ],
        ];

        foreach ($products as $productData) {
            $product = Product::query()->create($productData['data']);
            $product->fields()->sync($productData['fields']);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\ProductField;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            [
                'data' => [
                    'name'         => 'Деки',
                    'slug'         => 'decks',
                    'is_available' => true,
                ],
                'fields' => [
                    'width',
                    'length',
                    'material',
                    'wheelbase',
                    'plies_amount',
                    'concave',
                ],
            ],
            [
                'data' => [
                    'name'         => 'Фигуры',
                    'slug'         => 'obstacles',
                    'is_available' => true,
                ],
                'fields' => [
                    'width',
                    'length',
                    'material',
                ],
            ],
            [
                'data' => [
                    'name'         => 'Колеса',
                    'slug'         => 'wheels',
                    'is_available' => false,
                ],
                'fields' => [
                    'diameter',
                    'form',
                    'material',
                ],
            ],
            [
                'data' => [
                    'name'         => 'Подвески',
                    'slug'         => 'trucks',
                    'is_available' => false,
                ],
                'fields' => [
                    'width',
                    'material',
                ],
            ],
            [
                'data' => [
                    'name'         => 'Рипы',
                    'slug'         => 'riptapes',
                    'is_available' => true,
                ],
                'fields' => [
                    'width',
                    'length',
                ],
            ],
            [
                'data' => [
                    'name'         => 'Бордрейлы',
                    'slug'         => 'boardrais',
                    'is_available' => true,
                ],
                'fields' => [
                    'width',
                    'length',
                    'material',
                ],
            ],
            [
                'data' => [
                    'name'         => 'Запчасти',
                    'slug'         => 'parts',
                    'is_available' => false,
                ],
                'fields' => [
                    'material',
                ],
            ],
        ];

        $fields = ProductField::query()
            ->select(['slug', 'id'])
            ->get()
            ->pluck('id', 'slug')
            ->toArray();

        foreach ($categories as $categoryData) {
            $category = Category::query()->firstOrCreate($categoryData['data']);

            if ($category) {
                $category->fields()->sync(Arr::only($fields, $categoryData['fields']));
            }
        }
    }
}

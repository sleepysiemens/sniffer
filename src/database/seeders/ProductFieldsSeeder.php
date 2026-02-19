<?php

namespace Database\Seeders;

use App\Models\ProductField;
use Illuminate\Database\Seeder;

class ProductFieldsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields = [
            // common
            [
                'slug' => 'width',
                'name' => 'Ширина',
                'type' => 'int',
            ],
            [
                'slug' => 'length',
                'name' => 'Длина',
                'type' => 'int',
            ],
            [
                'slug' => 'material',
                'name' => 'Материал',
                'type' => 'json',
            ],
            // decks
            [
                'slug' => 'wheelbase',
                'name' => 'Колесная база',
                'type' => 'int',
            ],
            [
                'slug' => 'plies_amount',
                'name' => 'Количество слоев',
                'type' => 'int',
            ],
            [
                'slug' => 'concave',
                'name' => 'Конкейв',
                'type' => 'string',
            ],
            // wheels
            [
                'slug' => 'diameter',
                'name' => 'Диаметр',
                'type' => 'string',
            ],
            [
                'slug' => 'form',
                'name' => 'Форма',
                'type' => 'string',
            ],
        ];

        foreach ($fields as $field) {
            ProductField::query()->create($field);
        }
    }
}

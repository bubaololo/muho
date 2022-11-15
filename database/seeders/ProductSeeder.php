<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'name' => 'Шляпки',
                'price' => 1000,
                'weight' => 20,
                'description' => 'Целые шляпки в вакуумной упаковке',
                'image' => '20.jpg',
            ],
            [
                'name' => 'Шляпки',
                'price' => 1300,
                'weight' => 30,
                'description' => 'Целые шляпки в вакуумной упаковке',
                'image' => '30.jpg',
            ],
            [
                'name' => 'Шляпки',
                'price' => 2000,
                'weight' => 50,
                'description' => 'Целые шляпки в вакуумной упаковке',
                'image' => '50.jpg',
            ],
            [
                'name' => 'Шляпки',
                'price' => 3500,
                'weight' => 100,
                'description' => 'Целые шляпки в вакуумной упаковке',
                'image' => '100.jpg',
            ],
        ];
        Product::insert($products);
    }
}

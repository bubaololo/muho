<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

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
                'name' => 'Шляпки красного мухомора',
                'price' => 1000,
                'weight' => 20,
                'description' => 'Целые шляпки в вакуумной упаковке, собраны в экологически чистых лесах западной сибири, высушены при комнатной температуре',
                'image' => '20.jpg',
            ],
            [
                'name' => 'Шляпки красного мухомора',
                'price' => 1300,
                'weight' => 30,
                'description' => 'Целые шляпки в вакуумной упаковке, собраны в экологически чистых лесах западной сибири, высушены при комнатной температуре',
                'image' => '30.jpg',
            ],
            [
                'name' => 'Шляпки красного мухомора',
                'price' => 2000,
                'weight' => 50,
                'description' => 'Целые шляпки в вакуумной упаковке, собраны в экологически чистых лесах западной сибири, высушены при комнатной температуре',
                'image' => '50.jpg',
            ],
            [
                'name' => 'Шляпки красного мухомора',
                'price' => 3500,
                'weight' => 100,
                'description' => 'Целые шляпки в вакуумной упаковке, собраны в экологически чистых лесах западной сибири, высушены при комнатной температуре',
                'image' => '100.jpg',
            ],
        ];
        foreach ($products as &$product) {
            $product['slug'] = Str::slug($product['name'].$product['weight'].'gramm'.$product['price'].'rub');
        }
        Product::insert($products);
    }
}

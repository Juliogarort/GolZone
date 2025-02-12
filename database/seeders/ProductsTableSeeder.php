<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            ['name' => 'Camiseta FC Barcelona', 'price' => 89.99],
            ['name' => 'Camiseta Real Madrid', 'price' => 89.99],
            ['name' => 'Camiseta Manchester United', 'price' => 89.99],
            ['name' => 'Camiseta Liverpool', 'price' => 89.99],
            ['name' => 'Camiseta Juventus', 'price' => 89.99],
            ['name' => 'Camiseta Paris Saint-Germain', 'price' => 89.99],
            ['name' => 'Camiseta Bayern Munich', 'price' => 89.99],
            ['name' => 'Camiseta Chelsea', 'price' => 89.99],
            ['name' => 'Camiseta Inter de Milán', 'price' => 89.99],
            ['name' => 'Camiseta AC Milan', 'price' => 89.99]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

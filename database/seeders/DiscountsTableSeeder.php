<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Discount;
use App\Models\Category;
use App\Models\Product;

class DiscountsTableSeeder extends Seeder
{
    public function run()
    {
        $category = Category::where('name', 'Outlet')->first();
        $productChelsea = Product::where('name', 'Camiseta Chelsea 2024/2025')->first();
        $productMadrid = Product::where('name', 'Camiseta Real Madrid 2024/2025')->first();
        $productMilan = Product::where('name', 'Camiseta AC Milán 2024/2025')->first();
        $productPSG = Product::where('name', 'Camiseta Paris Saint-Germain 2024/2025')->first();
        $productAjax = Product::where('name', 'Camiseta Ajax x Bob Marley')->first();

        $discounts = [
            // Descuento global del 10%
            [
                'code' => 'DESC10',
                'type' => 'simple',
                'discount_percentage' => 10,
                'expires_at' => now()->addDays(30)
            ],
            // Descuento del 20% en la categoría Outlet
            [
                'code' => 'OUTLET20',
                'type' => 'category',
                'category_id' => $category->id,
                'discount_percentage' => 20,
                'expires_at' => now()->addDays(30)
            ],
            // Descuento fijo de 50€ en la camiseta del Chelsea
            [
                'code' => 'CHELSEA50',
                'type' => 'product',
                'product_id' => $productChelsea->id,
                'discount_amount' => 50,
                'expires_at' => now()->addDays(30)
            ],
            // Descuento del 15% en la camiseta del Real Madrid
            [
                'code' => 'MADRID15',
                'type' => 'product',
                'product_id' => $productMadrid->id,
                'discount_percentage' => 15,
                'expires_at' => now()->addDays(30)
            ],
            // Descuento fijo de 30€ en la camiseta del AC Milán
            [
                'code' => 'MILAN30',
                'type' => 'product',
                'product_id' => $productMilan->id,
                'discount_amount' => 30,
                'expires_at' => now()->addDays(30)
            ],
            // Descuento del 25% en la camiseta del PSG
            [
                'code' => 'PSG25',
                'type' => 'product',
                'product_id' => $productPSG->id,
                'discount_percentage' => 25,
                'expires_at' => now()->addDays(30)
            ],
            // Descuento fijo de 20€ en la camiseta del Ajax x Bob Marley
            [
                'code' => 'AJAX20',
                'type' => 'product',
                'product_id' => $productAjax->id,
                'discount_amount' => 20,
                'expires_at' => now()->addDays(30)
            ],
        ];

        foreach ($discounts as $discount) {
            Discount::firstOrCreate($discount);
        }
    }
}

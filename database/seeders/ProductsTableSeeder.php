<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    public function run()
    {
        $products = [
            // Premier League
            ['name' => 'Camiseta Chelsea 2024/2025', 'price' => 89.99, 'image' => 'CamisetaChelsea.jpg'],
            ['name' => 'Camiseta Arsenal 2024/2025', 'price' => 89.99, 'image' => 'CamisetaArsenal.jpg'],
            ['name' => 'Camiseta Liverpool 2024/2025', 'price' => 89.99, 'image' => 'CamisetaLiverpool.jpg'],
            
            // La Liga
            ['name' => 'Camiseta Real Madrid 2024/2025', 'price' => 89.99, 'image' => 'CamisetaMadrid.jpg'],
            ['name' => 'Camiseta FC Barcelona 2024/2025', 'price' => 89.99, 'image' => 'CamisetaBarcelona.jpg'],
            ['name' => 'Camiseta Atlético de Madrid 2024/2025', 'price' => 89.99, 'image' => 'CamisetaAtlético.jpg'],
            
            // Serie A
            ['name' => 'Camiseta Nápoles 2024/2025', 'price' => 89.99, 'image' => 'CamisetaNapoles.jpg'],
            ['name' => 'Camiseta Inter de Milán 2024/2025', 'price' => 89.99, 'image' => 'CamisetaInter.jpg'],
            ['name' => 'Camiseta AC Milán 2024/2025', 'price' => 89.99, 'image' => 'CamisetaMilan.jpg'],
            
            // Bundesliga
            ['name' => 'Camiseta FC Bayern Múnich 2024/2025', 'price' => 89.99, 'image' => 'CamisetaBayern.jpg'],
            ['name' => 'Camiseta Borussia Dortmund 2024/2025', 'price' => 89.99, 'image' => 'CamisetaDortmund.jpg'],
            ['name' => 'Camiseta Leverkusen 2024/2025', 'price' => 89.99, 'image' => 'CamisetaLeverkusen.jpg'],
            
            // Ligue 1
            ['name' => 'Camiseta Paris Saint-Germain 2024/2025', 'price' => 89.99, 'image' => 'CamisetaPSG.jpg'],
            ['name' => 'Camiseta Olympique de Lyon 2024/2025', 'price' => 89.99, 'image' => 'CamisetaLyon.jpg'],
            ['name' => 'Camiseta OL Marsella 2024/2025', 'price' => 89.99, 'image' => 'CamisetaMarsella.jpg'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

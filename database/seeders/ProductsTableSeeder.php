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
            ['name' => 'Camiseta Chelsea 2024/2025', 'price' => 89.99, 'liga'=>'premierleague', 'image' => 'CamisetaChelsea.jpg'],
            ['name' => 'Camiseta Arsenal 2024/2025', 'price' => 89.99, 'liga'=>'premierleague', 'image' => 'CamisetaArsenal.jpg'],
            ['name' => 'Camiseta Liverpool 2024/2025', 'price' => 89.99, 'liga'=>'premierleague', 'image' => 'CamisetaLiverpool.jpg'],
            
            // La Liga
            ['name' => 'Camiseta Real Madrid 2024/2025', 'price' => 89.99, 'liga'=>'laliga', 'image' => 'CamisetaMadrid.jpg'],
            ['name' => 'Camiseta FC Barcelona 2024/2025', 'price' => 89.99, 'liga'=>'laliga', 'image' => 'CamisetaBarcelona.jpg'],
            ['name' => 'Camiseta Atlético de Madrid 2024/2025', 'price' => 89.99, 'liga'=>'laliga', 'image' => 'CamisetaAtlético.jpg'],
            
            // Serie A
            ['name' => 'Camiseta Nápoles 2024/2025', 'price' => 89.99, 'liga'=>'seriea', 'image' => 'CamisetaNapoles.jpg'],
            ['name' => 'Camiseta Inter de Milán 2024/2025', 'price' => 89.99, 'liga'=>'seriea', 'image' => 'CamisetaInter.jpg'],
            ['name' => 'Camiseta AC Milán 2024/2025', 'price' => 89.99, 'liga'=>'seriea', 'image' => 'CamisetaMilan.jpg'],
            
            // Bundesliga
            ['name' => 'Camiseta FC Bayern Múnich 2024/2025', 'price' => 89.99, 'liga'=>'bundesliga', 'image' => 'CamisetaBayern.jpg'],
            ['name' => 'Camiseta Borussia Dortmund 2024/2025', 'price' => 89.99, 'liga'=>'bundesliga', 'image' => 'CamisetaDortmund.jpg'],
            ['name' => 'Camiseta Leverkusen 2024/2025', 'price' => 89.99, 'liga'=>'bundesliga', 'image' => 'CamisetaLeverkusen.jpg'],
            
            // Ligue 1
            ['name' => 'Camiseta Paris Saint-Germain 2024/2025', 'price' => 89.99, 'liga'=>'ligueun', 'image' => 'CamisetaPSG.jpg'],
            ['name' => 'Camiseta Olympique de Lyon 2024/2025', 'price' => 89.99, 'liga'=>'ligueun', 'image' => 'CamisetaLyon.jpg'],
            ['name' => 'Camiseta OL Marsella 2024/2025', 'price' => 89.99, 'liga'=>'ligueun', 'image' => 'CamisetaMarsella.jpg'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}

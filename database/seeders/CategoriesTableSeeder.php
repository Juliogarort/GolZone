<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        $categories = [
            ['name' => 'Outlet', 'description' => 'Camisetas antiguas y de temporadas anteriores.'],
            ['name' => 'Clasica', 'description' => 'Camisetas clásicas y actuales.'],
            ['name' => 'Nueva', 'description' => 'Camisetas nuevas y de última temporada.'],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate($category);
        }
    }
}

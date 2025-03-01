<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            CategoriesTableSeeder::class, // Primero se crean las categorías
            ProductsTableSeeder::class,
            DiscountsTableSeeder::class,
            UsersTableSeeder::class,
        ]);
    }
}

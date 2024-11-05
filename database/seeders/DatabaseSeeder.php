<?php

namespace Database\Seeders;

use Database\Seeders\ProductsSeeder;
use Database\Seeders\CategoriesSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategoriesSeeder::class,
            ProductsSeeder::class,
        ]);
    }
}

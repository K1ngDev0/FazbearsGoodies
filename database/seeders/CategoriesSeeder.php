<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category; // Make sure to import your Category model

class CategoriesSeeder extends Seeder
{
    public function run()
    {
        Category::create([
            'name' => 'Dumpster Diver Weekly',
            'description' => '',
        ]);

        Category::create([
            'name' => "Stan's Budget Tech",
            'description' => '',
        ]);

        Category::create([
            'name' => 'Smiles and Servos, Inc.',
            'description' => '',
        ]);

        Category::create([
            'name' => 'Rare Finds Auction',
            'description' => '',
        ]);
    }
}

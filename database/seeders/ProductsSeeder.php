<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Discount Ball Pit',
            'description' => 'A pit full of balls, but at a discount!',
            'price' => 29.99,
            'stock' => 100,
            'image' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/d847a7c6-0377-4dff-b3f2-2a33b2103d88/ddqkn34-0624d6da-e4e7-4868-8fa1-087fc87574a4.png/v1/fill/w_622,h_350/_fnaf_6__box_release_by_arayaentertainment_ddqkn34-350t.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7ImhlaWdodCI6Ijw9NzIwIiwicGF0aCI6IlwvZlwvZDg0N2E3YzYtMDM3Ny00ZGZmLWIzZjItMmEzM2IyMTAzZDg4XC9kZHFrbjM0LTA2MjRkNmRhLWU0ZTctNDg2OC04ZmExLTA4N2ZjODc1NzRhNC5wbmciLCJ3aWR0aCI6Ijw9MTI4MCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS5vcGVyYXRpb25zIl19.IwlhASZcXwWu_lOVb6oUblc3CMhzrsUwkHyLBDDQP6I',
            'category_id' => 1,
            'isAvailable' => true
        ]);

        Product::create([
            'name' => 'Balloon Barrel',
            'description' => 'Take ONE balloon from the barrel...',
            'price' => 29.99,
            'stock' => 50,
            'image' => 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/d847a7c6-0377-4dff-b3f2-2a33b2103d88/ddquhkz-c84f82c3-f92c-4f39-9d6b-a449792f7ad9.png/v1/fill/w_622,h_350/_fnaf_6__ballon_barrel_release_by_arayaentertainment_ddquhkz-350t.png?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcL2Q4NDdhN2M2LTAzNzctNGRmZi1iM2YyLTJhMzNiMjEwM2Q4OFwvZGRxdWhrei1jODRmODJjMy1mOTJjLTRmMzktOWQ2Yi1hNDQ5NzkyZjdhZDkucG5nIiwiaGVpZ2h0IjoiPD03MjAiLCJ3aWR0aCI6Ijw9MTI4MCJ9XV0sImF1ZCI6WyJ1cm46c2VydmljZTppbWFnZS53YXRlcm1hcmsiXSwid21rIjp7InBhdGgiOiJcL3dtXC9kODQ3YTdjNi0wMzc3LTRkZmYtYjNmMi0yYTMzYjIxMDNkODhcL2FyYXlhZW50ZXJ0YWlubWVudC00LnBuZyIsIm9wYWNpdHkiOjk1LCJwcm9wb3J0aW9ucyI6MC40NSwiZ3Jhdml0eSI6ImNlbnRlciJ9fQ.MiMQv99rFMaDsa5iLmx0eOSoBG98DrPLLpuLNEQzvJc',
            'category_id' => 1,
            'isAvailable' => false
        ]);
    }
}

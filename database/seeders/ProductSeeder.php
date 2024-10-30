<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name' => 'Modern Table Lamp',
            'description' => 'A stylish and modern lamp for your table.',
            'price' => 49.99,
            'image' => 'images/lamp.webp',
            'category_id' => 1,
            'currency_id' => 1,
            'is_top' => true,
        ]);

        Product::create([
            'name' => 'Ceiling Pendant Lamp',
            'description' => 'A beautiful pendant lamp for your ceiling.',
            'price' => 89.99,
            'image' => 'images/lamp.webp',
            'category_id' => 2,
            'currency_id' => 2,
            'is_top' => false,
        ]);
    }
}

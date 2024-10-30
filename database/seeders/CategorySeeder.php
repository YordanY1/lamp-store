<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        Category::create(['name' => 'Table Lamps', 'slug' => 'table-lamps', 'description' => 'Lamps for tables']);
        Category::create(['name' => 'Ceiling Lamps', 'slug' => 'ceiling-lamps', 'description' => 'Lamps for ceilings']);
    }
}

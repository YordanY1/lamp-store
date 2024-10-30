<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        Currency::create(['code' => 'USD', 'symbol' => '$', 'exchange_rate' => 1.0000]);
        Currency::create(['code' => 'EUR', 'symbol' => '€', 'exchange_rate' => 0.8500]);
    }
}

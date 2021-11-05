<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Price::create([
            'name' => 'Gratis',
            'sol'=>0,
            'value' => 0
        ]);

        Price::create([
            'name' => '19.99 US$ (nivel 1)',
            'sol'=>60.10,
            'value' => 19.99
        ]);

        Price::create([
            'name' => '49.99 US$ (nivel 2)',
            'sol'=>198.00,
            'value' => 49.99
        ]);

        Price::create([
            'name' => '99.99 US$ (nivel 3)',
            'sol'=>399.99,
            'value' => 99.99
        ]);

        Price::create([
            'name' => '199.99 US$ (nivel 4)',
             'sol'=>599.99,
            'value' => 199.99
        ]);
    }
}

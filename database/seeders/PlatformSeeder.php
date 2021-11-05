<?php

namespace Database\Seeders;

use App\Models\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //primer registro que se requiere agregar
        Platform::create([
            'name' => 'Youtube'
        ]);

        //segunda plataforma
        Platform::create([
            'name' => 'Vimeo'
        ]);
    }
}

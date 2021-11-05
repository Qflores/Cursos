<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Farmacia',
            'icon' => 'fas fa-prescription-bottle-alt fa-5x'
        ]);

        Category::create([
            'name' => 'Laboratorio clínico',
            'icon' => 'fas fa-flask fa-3x'
        ]);

        Category::create([
            'name' => 'Administración',
            'icon' => 'fas fa-business-time fa-3x'
        ]);
        Category::create([
            'name' => 'Gestión y Administración en Salud',
            'icon' => 'fas fa-chart-pie fa-3x'
        ]);
        Category::create([
            'name' => 'Psicología',
            'icon' => 'fas fa-puzzle-piece fa-3x'
        ]);
        Category::create([
            'name' => 'Fisioterapia y terapia física',
            'icon' => 'fas fa-shapes fa-3x'
        ]);
        Category::create([
            'name' => 'Nutrición',
            'icon' => 'fas fa-utensils fa-3x'
        ]);
        Category::create([
            'name' => 'Derecho',
            'icon' => 'fas fa-balance-scale-right fa-3x'
        ]);
        Category::create([
            'name' => 'Enfermería',
            'icon' => 'fas fa-user-nurse fa-3x'
        ]);
        Category::create([
            'name' => 'Obstetricia',
            'icon' => 'fas fa-user-md fa-3x'
        ]);
    }
}

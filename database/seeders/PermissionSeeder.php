<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //cursos
        Permission::create([
            'name'=>'Leer cursos',            
        ]);
        Permission::create([
            'name'=>'Crear cursos',
        ]);
        Permission::create([
            'name'=>'Editar cursos',
        ]);
        
        Permission::create([
            'name'=>'Eliminar cursos',
        ]);
        //dasboard
        Permission::create([
            'name'=>'Ver Dashboard',
        ]);
        //roles
        Permission::create([
            'name'=>'Crear role',
        ]);
        Permission::create([
            'name'=>'Listar role',
        ]);
        Permission::create([
            'name'=>'Editar role',
        ]);
       
        Permission::create([
            'name'=>'Eliminar role',
        ]);
        //usuario
        Permission::create([
            'name'=>'Leer usuarios',
        ]);

        Permission::create([
            'name'=>'Editar usuarios',
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Administrador de plataforma',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234')
        ]);
        //llenando la tabla role_has_permision
        
        //$user->roles()->attach(1);
        $user->assignRole('Admin');

        //Crear 5 registros de usuarios
        User::factory(5)->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //elimina la carpeta cursos con las imagenes y volver crear
        Storage::deleteDirectory('cursos');
        //generando carpeta cursos
        Storage::makeDirectory('cursos');
        //borramos la carpeta blog
        Storage::deleteDirectory('blog');
        //creamo la carpeta blog
        Storage::makeDirectory('blog');

        //creamos roles permisos
        $this->call(PermissionSeeder::class);
        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);
        $this->call(LevelSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(PriceSeeder::class);
        
        //llamar la plataforma
        $this->call(PlatformSeeder::class);
        $this->call(CourseSeeder::class);
        $this->call(BlogSeeder::class);
        $this->call(ComentarioSeeder::class);


    }
}

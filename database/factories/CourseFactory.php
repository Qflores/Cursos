<?php

namespace Database\Factories;

use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use App\Models\Level;
use App\Models\Category;
use App\Models\Price;

//para generar slug
use Illuminate\Support\Str;

class CourseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Course::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {        

        //se usa para la url amigable
        //slug-nombre
        //generamos el slug
        $title = $this->faker->sentence();
        $array = [
            'Desaficion de la vacunacion en el contexto de la pandemia',
            'Como manejar la salud mental en tiempos del covid 19',
            'Salud publica y bioseguridad en tiempos de pandemia',
            'Bioseguridad y salud ocupacional en tiempos de pandemia',
            'Plan covid 19 Elaboracion, Implementación y procedimientos a seguir',
            'Elaboracion de materiales para el proceso de fiscalizacion, en el marco del plan covid 19',
            'Psicología Jurídica Forense',
            'Gestion de la seguridad y salud e el trabajo',
            'Gratutito Seminario Internacional Criminalística',
            'Avances en el tratamiento manejoo Clinico, Nutricional y Psicosocial de las Secuelas'
        ];
        return [
            'title' => $this->faker->randomElement($array),
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            //generamos el slug pasando title
            'slug' => Str::slug($title),
            //rescatamos todo los user id    
            //el profer es con el id 1
            'credito'=>$this->faker->randomElement([2,3,4,5]),
            'hora'=>$this->faker->randomFloat(2,0,1),
            'registro'=>$this->faker->numberBetween(15,62),
            'libro'=>$this->faker->realText(50),
            'user_id' => $this->faker->randomElement([1,2,3,4,5]),  //User::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'price_id' => Price::all()->random()->id,
        ];
    }
}

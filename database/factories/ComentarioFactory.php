<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\Comentario;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ComentarioFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Comentario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mensaje'=> $this->faker->paragraph(150),
            'rating' =>$this->faker->randomElement([2,3,4,5]),
            'blog_id' => Blog::all()->random()->id,
            'user_id' =>User::all()->random()->id
        ];
    }
}

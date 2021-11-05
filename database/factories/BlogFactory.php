<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use League\CommonMark\Node\Block\Paragraph;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Blog::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence();
        return [
            'title'=>$this->faker->realText(80),
            'slug'=> Str::slug($title),
            'url'=> 'blog/' . $this->faker->image('public/storage/blog', 640, 480, null, false),
            'mensaje' => $this->faker->paragraph(),
            'user_id'=> User::all()->random()->id,
        ];
    }
}

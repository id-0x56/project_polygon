<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $published_at = rand(1, 5) > 1 ? $this->faker->dateTimeBetween('now', '+3 days') : null;
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'category_id' => Category::inRandomOrder()->first()->id,

            'title' => $this->faker->sentence(rand(3, 5), true),
            'body' => $this->faker->paragraph(rand(300, 500), true),

            'is_published' => !is_null($published_at) ? rand(0, 1) === 1 : false,
            'published_at' => $published_at,

            'deleted_at' => null,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function configure()
    {
        return $this->afterCreating(function (Post $post) {
            $categories = Category::all()->random(random_int(1, 3))->pluck('id');

            $post->categories()->sync($categories);
        });
    }

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'content' => $this->faker->paragraph(5),
            'title' => $this->faker->sentence(2),
            'description' => $this->faker->sentence(2),
            'user_id' => User::all()->random()->id,
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence(10);
        return [
            'title' => $title,
            'author_id' => User::latest()->first()->id,
            'slug' => str_replace(' ', '-', strtolower($title)),
            'excerpt' => fake()->text(),
            'content' => fake()->paragraph(10),
            'published_at' => now()
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => $this->faker->uuid,
            'user_id' => 1,  // Sesuai dengan permintaan
            'title' => $this->faker->sentence,
            'body' => $this->faker->paragraphs(3, true),
            'image' => 'https://source.unsplash.com/random/640x480/?article',
        ];
    }
}

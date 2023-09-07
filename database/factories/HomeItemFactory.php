<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HomeItem>
 */
class HomeItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(3, false),
            'content' => $this->faker->sentence(20, false),
            'image' => 'zXxZAXR8defaultFb9TJic3.jpg',
            'created_at' => now(),
            'sequence' => null,
        ];
    }
}

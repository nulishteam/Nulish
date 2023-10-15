<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'question_english' => $this->faker->sentence(6, true) . "?",
            'question_indonesia' => null,
            'level_id' => random_int(5, 7),
            'type_id' => random_int(1, 4),
            'question_key' => Str::random(8),
            'created_by' => 1,
            'created_at' => now(),
        ];
    }
}

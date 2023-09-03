<?php

namespace Database\Factories;

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
            'question_english' => $this->faker->sentence(4, false),
            'question_indonesia' => null,
            'level_id' => random_int(4, 6),
            'type_id' => random_int(1, 4),
            'question_key' => $this->faker->regexify('[A-Za-z0-9]{16}'),
            'created_by' => 1,
            'created_at' => now(),
        ];
    }
}

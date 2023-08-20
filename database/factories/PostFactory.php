<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date' => $this->faker->date(),
            'bed_time_start' => $this->faker->time(),
            'bed_time_end' => $this->faker->time(),
            'body_temperature' => $this->faker->randomFloat(1, 35.5, 38.0),
            'phone_time' => $this->faker->randomNumber(2), // 2桁の数字
            'exercise_time' => $this->faker->randomNumber(2),
            'job_time' => $this->faker->randomNumber(2),
            'bathing_time' => $this->faker->randomNumber(2),
            'performance' => $this->faker->randomElement(['⭐️', '⭐️⭐️', '⭐️⭐️⭐️']),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}

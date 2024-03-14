<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'student_id' => $this->faker->unique()->randomNumber(6),
            'date_of_birth' => $this->faker->date('Y-m-d', '2002-09-14'),
            'email' => $this->faker->unique()->safeEmail,
        ];
    }
}

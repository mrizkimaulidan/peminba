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
            'program_study_id' => 1,
            'school_class_id' => 1,
            'identification_number' => fake()->numberBetween(100000000, 999999999),
            'name' => fake()->name,
            'email' => fake()->email,
            'password' => bcrypt('secret'),
            'phone_number' => fake()->phoneNumber,
        ];
    }
}

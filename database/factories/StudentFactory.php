<?php

namespace Database\Factories;

use App\Models\ProgramStudy;
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
            'program_study_id' => fake()->randomElement(ProgramStudy::pluck('id')),
            'school_class_id' => fake()->randomElement(ProgramStudy::pluck('id')),
            'identification_number' => fake()->numberBetween(100000000, 999999999),
            'name' => substr(fake('id_ID')->name, 0, 30),
            'email' => substr(fake('id_ID')->unique()->safeEmail, 0, 30),
            'password' => '$2a$12$ChKeJotwLj9A.MQfoaQN6uc1xs5U5CRDNa6yMqmeAi9nIV8iaChj2', // secret
            'phone_number' => str_replace(['+'], '', fake('id_ID')->numerify('08##########')),
        ];
    }
}

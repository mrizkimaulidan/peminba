<?php

namespace Database\Factories;

use App\Models\Commodity;
use App\Models\Student;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrowing>
 */
class BorrowingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'commodity_id' => fake()->randomElement(Commodity::pluck('id')),
            'student_id' => fake()->randomElement(Student::pluck('id')),
            'subject_id' => fake()->randomElement(Subject::pluck('id')),
            'date' => now()->createFromDate(mt_rand(2010, now()->year), mt_rand(1, 12), mt_rand(1, 31)),
            'time_start' => now()->createFromTime(mt_rand(1, 24), mt_rand(1, 59), mt_rand(1, 59)),
            'is_returned' => fake()->randomElement([0, 1]),
            'note' => fake()->text,
            'officer' => fake()->name
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\Commodity;
use App\Models\Officer;
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
        $timeStart = now()->createFromTime(mt_rand(1, 24), mt_rand(1, 59), mt_rand(1, 59));
        $timeEnd = fake()->randomElement([now()->createFromTime(mt_rand(1, 24), mt_rand(1, 59), mt_rand(1, 59)), null]);
        $officerID = Officer::pluck('id');

        return [
            'commodity_id' => fake()->randomElement(Commodity::pluck('id')),
            'student_id' => fake()->randomElement(Student::pluck('id')),
            'subject_id' => fake()->randomElement(Subject::pluck('id')),
            'officer_id' => $timeEnd !== null ? fake()->randomElement($officerID) : null,
            'date' => now()->createFromDate(mt_rand(2010, now()->year), mt_rand(1, 12), mt_rand(1, 31)),
            'time_start' => $timeStart,
            'time_end' => $timeEnd,
            'is_returned' => $timeEnd !== null ? 1 : 0,
            'note' => fake()->randomElement([fake()->text, null])
        ];
    }
}

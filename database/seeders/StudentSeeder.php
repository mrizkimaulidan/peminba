<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Student::create([
            'program_study_id' => 1,
            'school_class_id' => 1,
            'identification_number' => '123456',
            'name' => 'Mahasiswa',
            'email' => 'mahasiswa@mail.com',
            'password' => '$2a$12$ChKeJotwLj9A.MQfoaQN6uc1xs5U5CRDNa6yMqmeAi9nIV8iaChj2', // secret,
            'phone_number' => '+628123456789',
        ]);

        $students = Student::factory(150)->make()->toArray();

        $recordsToInsert = [];
        foreach ($students as $student) {
            $createdAt = now();
            $student['created_at'] = $createdAt;
            $student['updated_at'] = $createdAt;
            $recordsToInsert[] = $student;
        }

        foreach (array_chunk($recordsToInsert, count($recordsToInsert) / 2) as $chunk) {
            Student::insert($chunk);
        }
    }
}

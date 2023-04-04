<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            'password' => bcrypt('secret'),
            'phone_number' => '+628123456789'
        ]);
    }
}

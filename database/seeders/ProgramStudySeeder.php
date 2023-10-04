<?php

namespace Database\Seeders;

use App\Models\ProgramStudy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProgramStudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programStudies = [
            'Teknik Informatika', 'Teknik Informatika Multimedia',
            'Teknik Komputer', 'Teknologi Rekayasa Komputer',
        ];

        foreach ($programStudies as $programStudy) {
            ProgramStudy::create([
                'name' => $programStudy
            ]);
        }
    }
}

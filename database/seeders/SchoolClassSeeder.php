<?php

namespace Database\Seeders;

use App\Models\SchoolClass;
use Illuminate\Database\Seeder;

class SchoolClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 6; $i++) {
            foreach (range('A', 'E') as $char) {
                $className = 'TI '.$i.$char;

                SchoolClass::create([
                    'name' => $className,
                ]);
            }

            foreach (range('A', 'E') as $char) {
                $className = 'TK '.$i.$char;

                SchoolClass::create([
                    'name' => $className,
                ]);
            }
        }

        for ($i = 1; $i <= 8; $i++) {
            foreach (range('A', 'E') as $char) {
                $className = 'TIM '.$i.$char;

                SchoolClass::create([
                    'name' => $className,
                ]);
            }

            foreach (range('A', 'C') as $char) {
                $className = 'TRK '.$i.$char;

                SchoolClass::create([
                    'name' => $className,
                ]);
            }
        }
    }
}

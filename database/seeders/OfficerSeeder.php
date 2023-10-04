<?php

namespace Database\Seeders;

use App\Models\Officer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfficerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Officer::create([
            'name' => 'Petugas',
            'email' => 'petugas@mail.com',
            'password' => bcrypt('secret'),
            'phone_number' => fake()->phoneNumber()
        ]);

        Officer::factory(100)->create();
    }
}

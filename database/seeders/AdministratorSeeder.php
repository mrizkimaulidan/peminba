<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdministratorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Administrator::create([
            'name' => 'Administrator',
            'email' => 'admin@mail.com',
            'password' => bcrypt('secret'),
            'phone_number' => fake()->phoneNumber()
        ]);

        Administrator::factory(100)->create();
    }
}

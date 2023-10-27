<?php

namespace Database\Seeders;

use App\Models\Officer;
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
            'password' => '$2a$12$ChKeJotwLj9A.MQfoaQN6uc1xs5U5CRDNa6yMqmeAi9nIV8iaChj2', // secret
            'phone_number' => fake()->phoneNumber(),
        ]);

        $officers = Officer::factory(100)->make()->toArray();

        $recordsToInsert = [];
        foreach ($officers as $officer) {
            $createdAt = now();
            $officer['created_at'] = $createdAt;
            $officer['updated_at'] = $createdAt;
            $recordsToInsert[] = $officer;
        }

        foreach (array_chunk($recordsToInsert, count($recordsToInsert) / 2) as $chunk) {
            Officer::insert($chunk);
        }
    }
}

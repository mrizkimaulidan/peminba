<?php

namespace Database\Seeders;

use App\Models\Administrator;
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
            'password' => '$2a$12$ChKeJotwLj9A.MQfoaQN6uc1xs5U5CRDNa6yMqmeAi9nIV8iaChj2', // secret
            'phone_number' => fake()->phoneNumber(),
        ]);

        $administrators = Administrator::factory(100)->make()->toArray();

        $recordsToInsert = [];
        foreach ($administrators as $administrator) {
            $createdAt = now();
            $administrator['created_at'] = $createdAt;
            $administrator['updated_at'] = $createdAt;
            $recordsToInsert[] = $administrator;
        }

        foreach (array_chunk($recordsToInsert, count($recordsToInsert) / 2) as $chunk) {
            Administrator::insert($chunk);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Borrowing;
use Illuminate\Database\Seeder;

class BorrowingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $borrowings = Borrowing::factory(500)->make()->toArray();

        $recordsToInsert = [];
        foreach ($borrowings as $borrowing) {
            $createdAt = now();
            $borrowing['created_at'] = $createdAt;
            $borrowing['updated_at'] = $createdAt;
            $recordsToInsert[] = $borrowing;
        }

        foreach (array_chunk($recordsToInsert, count($recordsToInsert) / 2) as $chunk) {
            Borrowing::insert($chunk);
        }
    }
}

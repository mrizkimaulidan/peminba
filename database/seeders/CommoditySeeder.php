<?php

namespace Database\Seeders;

use App\Models\Commodity;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Commodity::create([
                'name' => 'Proyektor ' . $i
            ]);
        }
    }
}

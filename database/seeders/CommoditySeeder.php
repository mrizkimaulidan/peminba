<?php

namespace Database\Seeders;

use App\Models\Commodity;
use Illuminate\Database\Seeder;

class CommoditySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 14; $i++) {
            Commodity::create([
                'name' => 'Proyektor '.$i,
            ]);
        }

        for ($i = 1; $i <= 12; $i++) {
            Commodity::create([
                'name' => 'Terminal '.$i,
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            Commodity::create([
                'name' => 'ATK (Alat Tulis Kantor) '.$i,
            ]);
        }

        for ($i = 1; $i <= 10; $i++) {
            Commodity::create([
                'name' => 'Kabel VGA to HDMI '.$i,
            ]);
        }
    }
}

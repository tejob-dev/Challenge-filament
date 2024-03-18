<?php

namespace Database\Seeders;

use App\Models\TerrainCertif;
use Illuminate\Database\Seeder;

class TerrainCertifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TerrainCertif::factory()
            ->count(5)
            ->create();
    }
}

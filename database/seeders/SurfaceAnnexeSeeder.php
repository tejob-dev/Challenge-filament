<?php

namespace Database\Seeders;

use App\Models\SurfaceAnnexe;
use Illuminate\Database\Seeder;

class SurfaceAnnexeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SurfaceAnnexe::factory()
            ->count(5)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\MaisonCertif;
use Illuminate\Database\Seeder;

class MaisonCertifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MaisonCertif::factory()
            ->count(5)
            ->create();
    }
}

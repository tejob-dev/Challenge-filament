<?php

namespace Database\Seeders;

use App\Models\RendezVous;
use Illuminate\Database\Seeder;

class RendezVousSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        RendezVous::factory()
            ->count(5)
            ->create();
    }
}

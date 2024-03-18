<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExigenceParticuliere;

class ExigenceParticuliereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExigenceParticuliere::factory()
            ->count(5)
            ->create();
    }
}

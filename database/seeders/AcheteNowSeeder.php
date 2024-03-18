<?php

namespace Database\Seeders;

use App\Models\AcheteNow;
use Illuminate\Database\Seeder;

class AcheteNowSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AcheteNow::factory()
            ->count(5)
            ->create();
    }
}

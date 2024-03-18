<?php

namespace Database\Seeders;

use App\Models\EtatAchat;
use Illuminate\Database\Seeder;

class EtatAchatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        EtatAchat::factory()
            ->count(5)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ExigenceImmeuble;

class ExigenceImmeubleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExigenceImmeuble::factory()
            ->count(5)
            ->create();
    }
}

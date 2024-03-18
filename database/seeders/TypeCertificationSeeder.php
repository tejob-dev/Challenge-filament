<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TypeCertification;

class TypeCertificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeCertification::factory()
            ->count(5)
            ->create();
    }
}

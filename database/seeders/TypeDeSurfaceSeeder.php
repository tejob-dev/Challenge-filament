<?php

namespace Database\Seeders;

use App\Models\TypeDeSurface;
use Illuminate\Database\Seeder;

class TypeDeSurfaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TypeDeSurface::factory()
            ->count(5)
            ->create();
    }
}

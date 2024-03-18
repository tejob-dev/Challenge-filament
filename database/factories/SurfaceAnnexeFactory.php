<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\SurfaceAnnexe;
use Illuminate\Database\Eloquent\Factories\Factory;

class SurfaceAnnexeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SurfaceAnnexe::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libel' => $this->faker->text(255),
        ];
    }
}

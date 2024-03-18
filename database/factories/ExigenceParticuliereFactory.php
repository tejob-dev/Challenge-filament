<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ExigenceParticuliere;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExigenceParticuliereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExigenceParticuliere::class;

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

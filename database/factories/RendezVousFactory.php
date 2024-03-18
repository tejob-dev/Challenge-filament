<?php

namespace Database\Factories;

use App\Models\RendezVous;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class RendezVousFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = RendezVous::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nompre' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'votr_email' => $this->faker->text(255),
            'rdv-date' => $this->faker->text(255),
            'rdv-hour' => $this->faker->text(255),
        ];
    }
}

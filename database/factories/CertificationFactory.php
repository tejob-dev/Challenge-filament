<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\Certification;
use Illuminate\Database\Eloquent\Factories\Factory;

class CertificationFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certification::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_prenom' => $this->faker->text(255),
            'adresse' => $this->faker->text(255),
            'email' => $this->faker->email,
            'contact' => $this->faker->text(255),
            'typebien' => $this->faker->text(255),
        ];
    }
}

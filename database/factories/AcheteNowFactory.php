<?php

namespace Database\Factories;

use App\Models\AcheteNow;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcheteNowFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AcheteNow::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_prenom' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'email' => $this->faker->email,
            'ou_recherchez_vous' => $this->faker->text(255),
            'typelogement' => $this->faker->text(255),
            'surface-recherch' => $this->faker->text(255),
            'min_budget' => $this->faker->text(255),
            'max_budget' => $this->faker->text(255),
            'nbr_piece' => $this->faker->text(255),
            'nbr_chambre' => $this->faker->text(255),
            'surface' => $this->faker->text(255),
            'criter_appart' => $this->faker->text(255),
            'filtrag_annonce' => $this->faker->text(255),
        ];
    }
}

<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\MaisonCertif;
use Illuminate\Database\Eloquent\Factories\Factory;

class MaisonCertifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MaisonCertif::class;

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
            'typelogement' => $this->faker->text(255),
            'nbr_chambre' => $this->faker->text(255),
            'nbr_salle' => $this->faker->text(255),
            'moment_acquis' => $this->faker->text(255),
            'ma_preference' => $this->faker->text(255),
            'surface_habitable' => $this->faker->text(255),
            'commune' => $this->faker->text(255),
            'type_construction' => $this->faker->text(255),
            'budget' => $this->faker->text(255),
            'autre_budget' => $this->faker->text(255),
            'type_emploi' => $this->faker->text(255),
            'proprietaire' => $this->faker->text(255),
        ];
    }
}

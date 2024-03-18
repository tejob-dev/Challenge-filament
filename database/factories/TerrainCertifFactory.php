<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\TerrainCertif;
use Illuminate\Database\Eloquent\Factories\Factory;

class TerrainCertifFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = TerrainCertif::class;

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
            'partic_group' => $this->faker->text(255),
            'obj_achat' => $this->faker->text(255),
            'commune' => $this->faker->text(255),
            'surface' => $this->faker->text(255),
            'config_terrain' => $this->faker->text(255),
            'prec_config_terrain' => $this->faker->text(255),
            'min_budget' => $this->faker->text(255),
            'max_budget' => $this->faker->text(255),
            'financement' => $this->faker->text(255),
            'info_spplement' => $this->faker->text(255),
            'votre_poste' => $this->faker->text(255),
            'moment_acquis' => $this->faker->text(255),
        ];
    }
}

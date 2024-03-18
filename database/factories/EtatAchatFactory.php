<?php

namespace Database\Factories;

use App\Models\EtatAchat;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtatAchatFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = EtatAchat::class;

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

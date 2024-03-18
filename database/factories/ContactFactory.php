<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom_prenom' => $this->faker->text(255),
            'email' => $this->faker->email,
            'objet' => $this->faker->text(255),
            'telephone' => $this->faker->text(255),
            'message' => $this->faker->sentence(20),
            'your-consent' => $this->faker->text(255),
        ];
    }
}

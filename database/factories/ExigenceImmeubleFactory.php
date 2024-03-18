<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\ExigenceImmeuble;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExigenceImmeubleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ExigenceImmeuble::class;

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

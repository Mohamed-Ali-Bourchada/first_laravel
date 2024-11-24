<?php

namespace Database\Factories;

use App\Models\Epreuve;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpreuveFactory extends Factory
{
    protected $model = Epreuve::class;

    public function definition()
    {
        return [
            'numero' => $this->faker->unique()->numberBetween(1000, 9999), // Generate a unique integer number between 1000 and 9999
            'date' => $this->faker->dateTimeBetween('now', '+1 year'), // Generate a date in the future
            'lieu' => $this->faker->city, // Generate a random city name for the lieu
            'matiere_id' => function () {
                return Matiere::inRandomOrder()->first()->id; // Get a random existing Matiere's ID
            },
        ];
    }
}

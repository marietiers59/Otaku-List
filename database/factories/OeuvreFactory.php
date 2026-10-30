<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class OeuvreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'titre' => fake()->sentence(3),
            'synopsis' => fake()->paragraph(),
            'annee' => fake()->numberBetween(1980, 2026),
            'status' => fake()->randomElement(['en_cours', 'termine', 'a_venir']),
            'nb_episodes_tomes' => fake()->optional()->numberBetween(1, 200),
            'studio' => fake()->company(),
            'image' => null,
            'note' => fake()->randomFloat(1, 0, 5),
        ];
    }
}

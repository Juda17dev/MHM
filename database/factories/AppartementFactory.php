<?php

namespace Database\Factories;

use App\Models\Immeuble;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appartement>
 */
class AppartementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'libelle' => fake()->word(),
            'immeuble_id' => Immeuble::all()->pluck('id')->random()
        ];
    }
}

<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visiteur>
 */
class VisiteurFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => fake()->lastName(),
            'prenom' => fake()->firstName(),
            'identite' => fake()->imageUrl(),
            'locataire_id' => User::query()->where('role_id',User::LOCATAIRE)->pluck('id')->random(),
            'agent_id' => User::query()->where('role_id',User::AGENT)->pluck('id')->random(),
            'statut' => fake()->randomElement(['En attente', 'Accepter', 'Refuser']),
            'created_at' => fake()->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),
            'updated_at' => fake()->dateTimeBetween('-1 years', 'now')->format('Y-m-d H:i:s'),

        ];
    }
}

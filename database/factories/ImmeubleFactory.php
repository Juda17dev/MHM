<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Immeuble>
 */
class ImmeubleFactory extends Factory
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
            'user_id' => User::query()->where('role_id', User::PROPRIETAIRE)->pluck('id')->random(),
            'adresse' => fake()->address()
        ];
    }
}

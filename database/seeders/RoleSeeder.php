<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        Role::query()->create([
            'libelle' => 'Agent'
        ]);


        Role::query()->create([
            'libelle' => 'Locataire'
        ]);


        Role::query()->create([
            'libelle' => 'Proprietaire'
        ]);
    }
}
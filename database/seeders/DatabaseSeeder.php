<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Appartement;
use App\Models\Immeuble;
use App\Models\Role;
use App\Models\User;
use App\Models\Visiteur;
use App\Models\Visiteurs;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::query()->truncate();
        Immeuble::query()->truncate();
        Appartement::query()->truncate();
        Visiteur::query()->delete();
        // User::query()->delete();
        $this->call([
            RoleSeeder::class,
            ImmeubleSeeder::class,
            AppartementSeeder::class,
            UserSeeder::class,
            VisiteurSeeder::class
        ]);
    }
}

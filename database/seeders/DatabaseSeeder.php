<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Role;
use App\Models\User;
use App\Models\Visiteurs;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Role::query()->truncate();
        // User::query()->delete();
        $this->call([
            RoleSeeder::class,
            UserSeeder::class
        ]);
    }
}

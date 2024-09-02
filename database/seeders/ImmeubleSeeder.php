<?php

namespace Database\Seeders;

use App\Models\Immeuble;
use Illuminate\Database\Seeder;

class ImmeubleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Immeuble::factory(4)->create();
    }
}

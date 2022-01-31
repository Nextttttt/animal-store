<?php

namespace Database\Seeders;

use App\Models\AnimalSpecies;
use Illuminate\Database\Seeder;

class AnimalSpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AnimalSpecies::factory()->count(5)->create();
    }
}

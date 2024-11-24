<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matiere;

class MatiereSeeder extends Seeder
{
    public function run()
    {
        // Create 10 Matiere records
        Matiere::factory()->count(500)->create();
    }
}

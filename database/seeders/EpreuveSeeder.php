<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Epreuve;

class EpreuveSeeder extends Seeder
{
    public function run()
    {
        Epreuve::factory()->count(500)->create();
    }
}

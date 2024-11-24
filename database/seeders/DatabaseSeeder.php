<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\MatiereSeeder;
use Database\Seeders\EpreuveSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed Matiere records first to ensure Epreuve can reference them
        $this->call(MatiereSeeder::class);

        // Then seed Epreuve records, which will reference Matiere
        $this->call(EpreuveSeeder::class);
    }
}

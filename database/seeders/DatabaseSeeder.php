<?php

namespace Database\Seeders;

use Database\Seeders\AdeSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\FaizSeeder;
use Database\Seeders\RivoSeeder;
use Database\Seeders\LutfieSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RivoSeeder::class,
            FaizSeeder::class,
            LutfieSeeder::class,
            AdeSeeder::class,
        ]);
    }
}

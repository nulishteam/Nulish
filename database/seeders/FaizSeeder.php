<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class FaizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TypeSeeder::class,
            LevelSeeder::class,
            QuestionSeeder::class,
        ]);
    }
}

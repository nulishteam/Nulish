<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('levels')->insert([
            'level_name' => 'Super Admin',
            'level_weight' => 100,
            'created_at' => now(),
        ]);

        DB::table('levels')->insert([
            'level_name' => 'Nulish Team',
            'level_weight' => 99,
            'created_at' => now(),
        ]);

        DB::table('levels')->insert([
            'level_name' => 'Administrator',
            'level_weight' => 90,
            'created_at' => now(),
        ]);

        DB::table('levels')->insert([
            'level_name' => 'Guru',
            'level_weight' => 10,
            'created_at' => now(),
        ]);

        DB::table('levels')->insert([
            'level_name' => 'Level 1',
            'level_weight' => 1,
            'created_at' => now(),
        ]);

        DB::table('levels')->insert([
            'level_name' => 'Level 2',
            'level_weight' => 2,
            'created_at' => now(),
        ]);

        DB::table('levels')->insert([
            'level_name' => 'Level 3',
            'level_weight' => 3,
            'created_at' => now(),
        ]);
    }
}

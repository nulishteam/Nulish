<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'type_name' => 'Simple Present Tense',
            'created_at' => now(),
        ]);
        DB::table('types')->insert([
            'type_name' => 'Simple Past Tense',
            'created_at' => now(),
        ]);
        DB::table('types')->insert([
            'type_name' => 'Present Future Tense',
            'created_at' => now(),
        ]);
        DB::table('types')->insert([
            'type_name' => 'Past Future Tense',
            'created_at' => now(),
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FAUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //update role super admin
        DB::table('users')
            ->where('id', 1)
            ->update(['level_id' => 1]);

        //create nulish team account
        User::factory()->create([
            'name' => 'Rivo',
            'email' => 'rivo@nulish.id',
            'password' => ('123456'),
            'level_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'Faiz',
            'email' => 'faiz@nulish.id',
            'password' => ('123456'),
            'level_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'Lutfie',
            'email' => 'lutfie@nulish.id',
            'password' => ('123456'),
            'level_id' => 2,
        ]);
        User::factory()->create([
            'name' => 'Ade',
            'email' => 'ade@nulish.id',
            'password' => ('123456'),
            'level_id' => 2,
        ]);

        //create fake admin account
        foreach (range(1, 5) as $i) {
            User::factory()->create([
                'name' => 'Admin ' . $i,
                'email' => 'admin' . $i . '@nulish.id',
                'password' => ('123456'),
                'level_id' => 3,
            ]);
        }

        //crate fake user account
        foreach (range(1, 50) as $i) {
            User::factory()
                ->count(1)
                ->create([
                    'name' => fake()->name(),
                    'level_id' => fake()->numberBetween(5, 7),
                    'email' => 'user' . $i . '@example.com',
                    'password' => ('123456'),
                ]);
        }
    }
}

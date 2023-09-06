<?php

namespace Database\Seeders;

use App\Models\HomeItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomeItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HomeItem::factory()
            ->count(2)
            ->create();
    }
}

<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Level;
use App\Models\Answer;
use App\Models\Feedback;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = Level::where('level_weight', '>=',10)->get('id')->toArray();
        $answers = Answer::orderBy(DB::raw('RAND()'))->get();
        for($i = 0; $i < 2000; $i++) {
            $answer = $answers[$i];
            $user  = User::with('level')->whereIn('level_id', $levels)->orderBy(DB::raw('RAND()'))->first();
            Feedback::factory()->create([
                'answer_id' => $answer->id,
                'user_id' => $user->id,
            ]);
        }

        $answers = Answer::orderBy(DB::raw('RAND()'))->get();
        for($i = 0; $i < 2000; $i++) {
            $answer = $answers[$i];
            $user  = User::with('level')->whereIn('level_id', $levels)->orderBy(DB::raw('RAND()'))->first();
            $time = $answer->created_at->addSeconds(rand(1 * 60, 7 * 24 * 60 * 60));
            Feedback::factory()->create([
                'answer_id' => $answer->id,
                'user_id' => $user->id,
                'created_at' => $time,
            ]);
        }

    }
}

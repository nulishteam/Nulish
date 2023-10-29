<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users  = User::with('level')->orderBy(DB::raw('RAND()'))->get();
        $questions = Question::with('level')->orderBy(DB::raw('RAND()'))->get();
        for ($i = 0; $i < 30; $i++) {
            $user = $users[$i];
            $uweight = $user->level->level_weight;
            $count = 0;
            $time = Carbon::now()->addYears(-2);
            if ($uweight < 10) {
                foreach ($questions as $question) {
                    $now = Carbon::now();
                    $qweight = $question->level->level_weight;
                    if ($qweight <= $uweight && $count < $uweight * 100) {
                        if ($time < $now)
                            $time = $time->addSeconds(rand(15 * 60, 7 * 24 * 60 * 60));
                        if ($time > $now)
                            $time = $now->addSecond(rand(-24 * 60 * 60, -1));
                        Answer::factory()
                            ->create([
                                'user_id' => $user->id,
                                'question_id' => $question->id,
                                'created_at' => $time,
                            ]);
                        $count++;
                    }
                }
            }
        }
    }
}

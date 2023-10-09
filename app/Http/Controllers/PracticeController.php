<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Faker\Core\Number;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $answered = Answer::where('user_id', $user->id)->get('question_id');
        $question = Question::where('level_id', $user->level_id)->whereNotIn('id', $answered)->orderBy(DB::raw('RAND()'))->first();
        // dd($questions);
        // $max = $questions->count();
        // $question = $questions[$this->getNumber($max)];
        return view('user-area.practice', compact('question'));
    }

    private function getNumber(int $max)
    {
        return rand(0, ($max - 1));
    }
}

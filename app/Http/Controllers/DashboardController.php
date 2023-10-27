<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $answers = Answer::orderBy('created_at', 'desc')->with('question', 'user')->paginate(20);
        $user = Auth::user();
        $answered = Answer::where('user_id', $user->id)->get('question_id');
        $question = Question::where('level_id', $user->level_id)->whereNotIn('id', $answered)->orderBy(DB::raw('RAND()'))->first();
        $now = new Carbon();
        return view('user-area.index', compact('answers','question', 'now'));
    }
}

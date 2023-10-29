<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Feedback;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\RecentActivity;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;

class DashboardController extends Controller
{
    public function index()
    {
        $number = 10;
        $first = 2;
        $answers = Answer::orderBy('created_at', 'desc')->take($number)->get();
        $recents = new Collection();
        foreach ($answers as $item) {
            $recent = new RecentActivity([
                'user_id' => $item->user_id,
                'time' => strtotime($item->created_at->toDateTimeString()),
                'link' => route('profile', $item->user->user_key),
                'created_at' => $item->created_at,
                'text' => $item->user->name . ' answered a daily question'
            ]);
            $recents->push($recent);
        }
        $feedbacks = Feedback::with('answer')->orderBy('created_at', 'desc')->take($number)->get();
        foreach ($feedbacks as $item) {
            $recent = new RecentActivity([
                'user_id' => $item->user_id,
                'time' => strtotime($item->created_at->toDateTimeString()),
                'link' => route('profile', $item->answer->user->user_key),
                'created_at' => $item->created_at,
                'text' => $item->user->name . ' gave a feedback to ' . $item->answer->user->name . '\'s answer'
            ]);
            $recents->push($recent);
        }
        $recents->loadMissing('user');
        $recents = $recents->sortByDesc('time', SORT_NUMERIC)->values();
        $recents1 = $recents->take($first);
        $recents2 = $recents->skip($first)->take($number-$first);
        // dd($recents1->toArray());
        $user = Auth::user();
        $answered = Answer::where('user_id', $user->id)->get('question_id');
        $question = Question::where('level_id', $user->level_id)->whereNotIn('id', $answered)->orderBy(DB::raw('RAND()'))->first();
        $now = new Carbon();
        return view('user-area.index', compact('question', 'now', 'recents1', 'recents2'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $answers = Answer::orderBy('created_at', 'desc')->with('question', 'user')->paginate(20);
        $now = new Carbon();
        return view('user-area.index', compact('answers', 'now'));
    }
}

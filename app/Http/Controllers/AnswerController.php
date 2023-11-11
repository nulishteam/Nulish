<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Answer;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        try {
            $keyGen = $this->keyGen();
            $request->validate([
                'q_key' => 'required',
                'answer_text' => 'required',
            ]);
            $question_id = Question::where('question_key', $request->q_key)->first()->id;
            $answer = Answer::create([
                'user_id' => Auth::user()->id,
                'question_id' => $question_id,
                'answer_text' => $request->answer_text,
                'answer_key' => $keyGen,
            ]);
            return redirect()->route('user-area');
        } catch (Exception $ex) {
            return response()->json($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(Answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $answer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Answer $answer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Answer $answer)
    {
        //
    }

    private function keyGen()
    {
        // $faker = Factory::create();
        $key = Str::random(16);
        $cek = Answer::where('answer_key', $key)->get('answer_key')->count();
        if ($cek > 0) {
            $key = $this->keyGen();
        }

        return $key;
    }
}

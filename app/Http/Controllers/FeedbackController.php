<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Answer;
use App\Models\Feedback;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedbackController extends Controller
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
            $request->validate([
                'answer_key' => 'required',
                'feedback_text' => 'required',
            ]);
            $answer_id = Answer::where('answer_key', $request->answer_key)->first()->id;
            Feedback::create([
                'user_id' => Auth::user()->id,
                'answer_id' => $answer_id,
                'feedback_text' => $request->feedback_text,
                'feedback_key' => $this->keyGen(),
            ]);
            return redirect()->back();
        } catch (Exception $ex) {
            return response()->json($ex);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function show(Feedback $feedback)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function edit(Feedback $feedback)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feedback $feedback)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Feedback  $feedback
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feedback $feedback)
    {
        //
    }

    private function keyGen()
    {
        // $faker = Factory::create();
        $key = Str::random(16);
        $cek = Feedback::where('feedback_key', $key)->get('feedback_key')->count();
        if ($cek > 0) {
            $key = $this->keyGen();
        }

        return $key;
    }
}

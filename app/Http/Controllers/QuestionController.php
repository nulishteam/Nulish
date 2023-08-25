<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rspMsg = null, Request $request = null)
    {
        //$questions = Question::all()->loadMissing('level:id,level_name', 'type:id,type_name', 'createdBy:id,name')->sortBy([['level_id', 'asc'], ['updated_at', 'desc']]);
        $questions = Question::with('level:id,level_name', 'type:id,type_name', 'createdBy:id,name')->orderBy('level_id')->orderBy('question_english')->paginate(20);
        //dd($questions);
        return view('admin.question-master.index', compact('questions', 'rspMsg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($isBulk = false)
    {
        $obj = new Question();
        dd($obj);
        return view('admin.question-master.edit', compact($obj));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == null) {
            return abort(400);
        }
        $obj = Question::find($id);
        $obj->delete();
        return response()->json([
            'message' => 'Selected question deleted successfully',
        ]);

    }
}

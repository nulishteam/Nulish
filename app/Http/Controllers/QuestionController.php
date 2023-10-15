<?php

namespace App\Http\Controllers;

use Exception;
use Faker\Factory;
use App\Models\Type;
use App\Models\Level;
use App\Models\Question;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rspMsg = null, $filter = null)
    {
        //$questions = Question::all()->loadMissing('level:id,level_name', 'type:id,type_name', 'createdBy:id,name')->sortBy([['level_id', 'asc'], ['updated_at', 'desc']]);
        $questions = Question::with('level:id,level_name', 'type:id,type_name', 'createdBy:id,name')->orderBy('level_id')->orderBy('type_id')->orderBy('question_english')->paginate(20);
        $levels = $this->getAllLevel();
        $types = $this->getAllType();
        //dd($questions);
        return view('admin.question-master.index', compact('questions', 'rspMsg', 'levels', 'types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($isBulk = false)
    {
        $obj = new Question();
        $levels = $this->getAllLevel();
        $types = $this->getAllType();
        //dd($levels);
        return view('admin.question-master.edit', compact('obj', 'levels', 'types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        try {
            $id = decrypt($request->id);
            // //Logic test
            $cek = Question::where('id', '!=', $id)->where('deleted_at', null)->where('level_id', $request->level_id)->where('type_id', $request->type_id)->where('question_english', $request->question_english)->count();
            if ($cek > 0) {
                throw new Exception('Question already exists');
            }

            $request->validate([
                'level_id' => 'required',
                'type_id' => 'required',
                'question_english' => 'required',
            ]);

            //lengkapi data yang kosong
            if ($id == null) {
                $request->merge(['question_key' => $this->keyGen()]);
            }
            $request->merge(['created_by' => auth()->user()->id]);

            Question::updateOrCreate(
                ['id' => $id],
                $request->all(),
            );

            $status = "Created";
            if ($id > 0) {
                $status = "Updated";
            }

            $msg = $status . ' successfully';
            $rspMsg = (object) ['title' => 'Success', 'message' => $msg, 'status' => 'success'];
            return $this->index($rspMsg);
        } catch (Exception $ex) {
            $obj = (object) $request->all();
            $obj->id = $id == null ? 0 : $id;
            $rspMsg = (object) ['title' => 'Error', 'message' => $ex->getMessage(), 'status' => 'error'];
            $levels = $this->getAllLevel();
            $types = $this->getAllType();
            return view('admin.question-master.edit', compact('obj', 'rspMsg', 'types', 'levels'));
        }
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
    public function edit($key)
    {
        if ($key == null) {
            return abort(400);
        }

        $obj = Question::where('question_key', $key)->firstOrFail();
        if ($obj == null) {
            return abort(404);
        }
        $levels = $this->getAllLevel();
        $types = $this->getAllType();
        //dd($obj);
        return view('admin.question-master.edit', compact('obj', 'levels', 'types'));
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
    public function destroy($key)
    {
        if ($key == null) {
            return abort(400);
        }
        $obj = Question::where('question_key', $key)->firstOrFail();
        $obj->delete();
        return response()->json([
            'message' => 'Selected question deleted successfully',
        ]);
    }
    private function getAllLevel()
    {
        return Level::all()->where('level_weight', '<', '90');
    }

    private function getAllType()
    {
        return Type::all();
    }

    private function keyGen()
    {
        // $faker = Factory::create();
        $key = Str::random(8);
        $cek = Question::where('question_key', $key)->get('question_key')->count();
        if ($cek > 0) {
            $key = $this->keyGen();
        }

        return $key;
    }
}

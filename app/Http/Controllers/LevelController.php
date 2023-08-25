<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Exception;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rspMsg = null)
    {
        $levels = Level::all()->sortBy('level_weight');
        return view('admin.level-master.index', compact('levels', 'rspMsg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new Level();
        return view('admin.level-master.edit', compact('obj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $id = decrypt($request->id);
            //Logic test
            $cek = Level::where('id', '!=', $id)->where('deleted_at', null)->where('level_name', $request->level_name)->count();
            if ($cek > 0) {
                throw new Exception('<strong>' . $request->level_name . '</strong> already exists');
            }

            $cek = Level::where('id', '!=', $id)->where('deleted_at', null)->where('level_weight', $request->level_weight)->count();
            if ($cek > 0) {
                throw new Exception('There is another level with weight ' . $request->level_weight);
            }

            $request->validate([
                'level_name' => 'required',
                'level_weight' => 'required',
            ]);
            Level::updateOrCreate(
                ['id' => $id],
                $request->all(),
            );

            $msg = 'Saved successfully';
            $rspMsg = (object) ['title' => 'Success', 'message' => $msg, 'status' => 'success'];
            return $this->index($rspMsg);
        } catch (Exception $ex) {
            $obj = (object) $request->all();
            $obj->id = $id == null ? 0 : $id;
            $rspMsg = (object) ['title' => 'Error', 'message' => $ex->getMessage(), 'status' => 'error'];
            return view('admin.level-master.edit', compact('obj', 'rspMsg'));

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function show(Level $level)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == null) {
            return abort(400);
        }

        $obj = Level::find($id);
        if ($obj == null) {
            return abort(404);
        }

        return view('admin.level-master.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Level $level)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Level  $level
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == null) {
            return abort(400);
        }
        $obj = Level::find($id);
        $obj->delete();
        return response()->json([
            'message' => '<strong>' . $obj->level_name . '</strong> deleted successfully',
        ]);
    }
}

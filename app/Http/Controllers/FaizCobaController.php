<?php

namespace App\Http\Controllers;

use App\Models\Level;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;

class FaizCobaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rspMsg = null)
    {
        $levels = Level::where('level_weight', '<', 90)->get();
        //dd($levels);
        return view('faiz-coba.index', compact('levels', 'rspMsg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new Level();
        //dd($obj);
        return view('faiz-coba.edit', compact('obj'));
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

            //logic test
            $cek = Level::where('id', '!=', $id)->where('level_name', $request->level_name)->where('deleted_at', null)->get();
            if ($cek->count() > 0) {
                throw new Exception('Level dengan nama ' . $request->level_name . ' sudah ada');
            }

            $cek = Level::where('id', '!=', $id)->where('level_weight', $request->level_weight)->where('deleted_at', null)->get();
            if ($cek->count() > 0) {
                throw new Exception('Level dengan weight ' . $request->level_weight . ' sudah ada');
            }

            $request->validate([
                'level_name' => 'required',
                'level_weight' => 'required',
            ]);

            Level::updateOrCreate(
                ['id' => $id],
                $request->all(),
            );

            $msg = "Saved Successfully";
            $rspMsg = (object) ['title' => 'Success', 'message' => $msg, 'status' => 'success'];
            //dd($rspMsg);
            return $this->index($rspMsg);
        } catch (Exception $ex) {
            $obj = (object) $request->all();
            $obj->id = ($id == null) ? 0 : $id;
            $rspMsg = (object) ['title' => 'Error', 'message' => $ex->getMessage(), 'status' => 'error'];
            return view('faiz-coba.edit', compact('obj', 'rspMsg'));
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
            return abort(404);
        }
        $obj = Level::find($id);
        if ($obj == null) {
            return abort(404);
        }
        //dd($obj);
        return view('faiz-coba.edit', compact('obj'));
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
        try {
            if ($id == null) {
                throw new Exception('Request invalid');
            }
            $obj = Level::find($id);
            $obj->delete();
            return response()->json([
                'title' => 'Success',
                'message' => '<strong>' . $obj->type_name . '</strong> deleted successfully',
                'type' => 'success',
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'title' => 'Error',
                'message' => $ex->getMessage(),
                'type' => 'error',
            ]);
            //return response()->json($ex);
        }
    }
}

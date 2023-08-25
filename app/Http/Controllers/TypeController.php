<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Exception;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rspMsg = null)
    {
        $types = Type::all();
        //dd($rspMsg->message);
        return view('admin.type-master.index', compact('types', 'rspMsg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new Type();
        return view('admin.type-master.edit', compact('obj'));
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
            $cek = Type::where('id', '!=', $id)->where('deleted_at', null)->where('type_name', $request->type_name)->count();
            if ($cek > 0) {
                throw new Exception('<strong>' . $request->type_name . '</strong> already exists');
            }

            $request->validate([
                'type_name' => 'required',
            ]);
            Type::updateOrCreate(
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
            return view('admin.type-master.edit', compact('obj', 'rspMsg'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == null) {
            return abort(400);
        }

        $obj = Type::find($id);
        if ($obj == null) {
            return abort(404);
        }
        //dd($obj);
        return view('admin.type-master.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id == null) {
            return abort(400);
        }
        $obj = Type::find($id);
        $obj->delete();
        return response()->json([
            'message' => '<strong>' . $obj->type_name . '</strong> deleted successfully',
        ]);
    }
}

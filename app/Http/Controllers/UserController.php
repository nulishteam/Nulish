<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rspMsg = null)
    {

        $users = User::all();
        //dd($rspMsg->message);
        //dd($users);
        return view('admin.user-master.index', compact('users', 'rspMsg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new User();
        //dd ($obj);
        return view('admin.user-master.edit', compact('obj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // $request ini kiriman data / value dari action di form
    { //dd($request);
        try {
            $id = decrypt($request->id);
            //Logic test
            $cek = User::where('id', '!=', $id)->where('deleted_at', null)->where('name', $request->name)->count();
            if ($cek > 0) {
                throw new Exception('<strong>' . $request->name . '</strong> already exists');
            }

            $request->validate([
                'name' => 'required',
            ]);
            User::updateOrCreate(
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
            return view('admin.user-master.edit', compact('obj', 'rspMsg'));
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id) // awalnya (User $user)
    {
        if ($id == null) {
            return abort(400);
        }

        $obj = User::find($id);
        if ($obj == null) {
            return abort(404);
        }
        //dd($obj);
        return view('admin.user-master.edit', compact('obj'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
try {
            $obj = User::find($id);
            if ($obj == null) {
                throw new Exception("Item not found. Fail deleting data");
            }
            //Storage::disk('local')->delete('public/img/' . $obj->image); //image tidak dihapus agar bisa di-restore..

            $obj->delete();
            dd($obj);

            return response()->json([
                'title' => 'Success',
                'message' => 'Selected item deleted successfully',
                'status' => 'success',
            ]);
        } catch (Exception $ex) {
            return response()->json([
                'title' => 'Error',
                'message' => $ex->getMessage(),
                'status' => 'error',
            ]);
        }
    }
}

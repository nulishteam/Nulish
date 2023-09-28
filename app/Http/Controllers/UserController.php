<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Level;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $levels = $this->getAllLevel();
        //dd ($obj);
        return view('admin.user-master.edit', compact('obj', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // $request ini kiriman data / value dari action di form
    {
        // dd($request);
        try {
            $id = decrypt($request->id);
            //Logic test
            if ($id == null) {
                $request->validate([ //image dan password harus ada ketika create. Jika edit, tidak wajib karena ada kemungkinan sudah ada
                    'user_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    'password' => 'required',
                    'passwordRetype' => 'required',
                ]);
                $user_key = $this->keyGen();
            } else {
                $request->validate([ //memastikan file berupa image
                    'user_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
                $user_key = User::find($id)->user_key;
            }

            $cek = User::where('id', '!=', $id)->where('deleted_at', null)->where('email', $request->name)->count();
            if ($cek > 0) {
                throw new Exception('<strong>' . $request->email . '</strong> already used. Please use another email');
            }

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'level_id' => 'required',
            ]);

            if (isset($request->password) && isset($request->passwordRetype)) {
                if ($request->password != $request->passwordRetype) {
                    throw new Exception('Password does not match');
                }
            }

            //cek and gen user_key
            if ($request->user_key == null) {
                $request->merge(['user_key' => $user_key]);
            }

            $obj = $request->all();

            //save image data
            if ($imageData = $request->file('user_image')) {
                $fileType = explode(".", $imageData->getClientOriginalName())[1];
                $dir = '/img/user_image/';
                $fileName = $user_key . '.' . $fileType;
                if ($id > 0) {
                    $oldImageName = User::find($id)->user_image;
                    if (Storage::disk('public')->exists($dir . $oldImageName))
                        Storage::disk('public')->delete($dir . $oldImageName);
                }
                $imageData->storeAs($dir, $fileName, 'public');
                $obj['user_image'] = $fileName;
                //dd($fileName);
            } else {
                unset($request['user_image']);
            }

            User::updateOrCreate(
                ['id' => $id],
                $obj,
            );

            $msg = 'Saved successfully';
            $rspMsg = (object) ['title' => 'Success', 'message' => $msg, 'status' => 'success'];
            return $this->index($rspMsg);
        } catch (Exception $ex) {
            dd($ex);
            $obj = (object) $request->all();
            $obj->id = $id == null ? 0 : $id;
            $levels = $this->getAllLevel();
            $rspMsg = (object) ['title' => 'Error', 'message' => $ex->getMessage(), 'status' => 'error'];
            return view('admin.user-master.edit', compact('obj', 'rspMsg', 'levels'));
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
        $levels = $this->getAllLevel();
        //dd($obj);
        return view('admin.user-master.edit', compact('obj', 'levels'));
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
        // try {
        //             $obj = User::find($id);
        //             if ($obj == null) {
        //                 throw new Exception("Item not found. Fail deleting data");
        //             }
        //             //Storage::disk('local')->delete('public/img/' . $obj->image); //image tidak dihapus agar bisa di-restore..

        //             $obj->delete();
        //             dd($obj);

        //             return response()->json([
        //                 'title' => 'Success',
        //                 'message' => 'Selected item deleted successfully',
        //                 'status' => 'success',
        //             ]);
        //         } catch (Exception $ex) {
        //             return response()->json([
        //                 'title' => 'Error',
        //                 'message' => $ex->getMessage(),
        //                 'status' => 'error',
        //             ]);
        //         }
        if ($id == null) {
            return abort(400);
        }
        $obj = User::find($id);
        $obj->delete();
        return response()->json([
            'message' => '<strong>' . $obj->name . '</strong> deleted successfully',
        ]);
    }

    private function getAllLevel()
    {
        return Level::all();
    }

    private function keyGen()
    {
        $key = 'u' . Str::random(16);
        $cek = User::where('user_key', $key)->get('user_key')->count();
        if ($cek > 0) {
            $key = $this->keyGen();
        }

        return $key;
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\HomeItem;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($rspMsg = null)
    {
        $home_items = HomeItem::all();
        return view('admin.home-item-master.index', compact('home_items', 'rspMsg'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $obj = new HomeItem();
        return view('admin.home-item-master.edit', compact('obj'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // try {
        //     $id = decrypt($request->id);
        //     //Logic test
        //     $obj = HomeItem::find($id);

        //     // dd($obj);

        // //upload image
        // $path = $request->file('avatar')->store('avatars');

        // return $path;
        // // if ($request->image) {
        // //     $file = $request->File('image');
        // //     $ext  = $file->hashName() . "." . $file->clientExtension();
        // //     $file->storeAs('img/', $ext);
        // //     $user->title = $ext;
        // // }

        // //      //create image
        // HomeItem::updateOrCreate([
        //     'image'     => $image->hashName(),
        //     'title'     => $request->title,
        //     'content'   => $request->content
        // ]);

        //     $msg = 'Saved successfully';
        //     $rspMsg = (object) ['title' => 'Success', 'message' => $msg, 'status' => 'success'];

        //     return $this->index($rspMsg);
        // } catch (Exception $ex) {
        //     $obj = (object) $request->all();
        //     $obj->id = $id == null ? 0 : $id;
        //     $rspMsg = (object) ['title' => 'Error', 'message' => $ex->getMessage(), 'status' => 'error'];
        //     return view('admin.home-item-master.edit', compact('obj', 'rspMsg'));

        // }

        try {
            $id = decrypt($request->id);
            $cek = HomeItem::where('title', $request->title)->where('id', '!=', $id)->where('deleted_at', null)->get();
            if ($cek->count() > 0) {
                throw new Exception('Home Item dengan title ' . $request->title . ' sudah ada');
            }

            $cek = HomeItem::where('content', $request->content)->where('id', '!=', $id)->where('deleted_at', null)->get();
            if ($cek->count() > 0) {
                throw new Exception('Home Item dengan content sama sudah ada');
            }

            $request->merge(['image' => 'no_image.jpg']);
              //validate form
           $this->validate($request, [
            'title'     => 'required|min:5',
            // 'image'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content'   => 'required|min:10'
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/img', $image->hashName());

        //create post
        HomeItem::updateOrCreate([
            ['id' => $id],
            $request->all(),
        ]);

            $msg = 'Saved successfully';
            $rspMsg = (object) ['title' => 'Success', 'message' => $msg, 'status' => 'success'];
            return $this->index($rspMsg);
        } catch (Exception $ex) {
                $obj = (object) $request->all();
                $obj->id = $id == null ? 0 : $id;
                $rspMsg = (object) ['title' => 'Error', 'message' => $ex->getMessage(), 'status' => 'error'];
                return view('admin.home-item-master.edit', compact('obj', 'rspMsg'));

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomeItem  $homeItem
     * @return \Illuminate\Http\Response
     */
    public function show(HomeItem $homeItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomeItem  $homeItem
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if ($id == null) {
            return abort(400);
        }

        $obj = HomeItem::find($id);
        if ($obj == null) {
            return abort(404);
        }
        // dd($obj);
        return view('admin.home-item-master.edit', compact('obj'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomeItem  $homeItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HomeItem $homeItem)
    {
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomeItem  $homeItem
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            $obj = HomeItem::find($id);
            if($obj == null){
                throw new Exception("Item not found. Fail deleting data");
            }
            Storage::disk('local')->delete('public/img/'.$obj->image);
            $obj->delete();

            return response()->json([
                'title' => 'Success',
                'message' => 'Selected question deleted successfully',
                'status' => 'success',
            ]);
        } catch(Exception $ex){
            return response()->json([
                'title' => 'Error',
                'message' => $ex->getMessage(),
                'status' => 'error',
            ]);
        }

    }
}

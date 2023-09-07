<?php

namespace App\Http\Controllers;

use App\Models\HomeItem;

class LandingController extends Controller
{
    public function index()
    {
        $landing = HomeItem::select('title', 'image', 'content', 'created_at')->latest()->get();

        //add sequence for each homeitem
        $i = 0;
        foreach ($landing as $item) {
            $item->sequence = $i;
            $i++;
        }
        // dd($landing[1]->sequence % 2);

        return view('landing.index', compact('landing'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\HomeItem;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $landing = HomeItem::select('title', 'image', 'content', 'created_at')->latest()->get();
        return view('landing.index', compact('landing'));
    }
}

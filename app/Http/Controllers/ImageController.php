<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{
    public function urlGen($dir, $fileName)
    {
        $file = Storage::disk('public')->get('/img/image_not_available.png');
        if (strlen($dir) > 0)
            $dir = $dir . '/';
        $path = '/img/' . $dir . $fileName;
        //dd($path);
        if (Storage::disk('public')->exists($path)) {
            $file = Storage::disk('public')->get($path);
        }
        $type = Storage::mimeType($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);
        return $response;
    }
}

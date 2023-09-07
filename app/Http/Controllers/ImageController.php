<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function urlGen($dir, $fileName)
    {
        $file = file_get_contents(asset('assets/img/not_available.jpg'));
        $type = Storage::mimeType(asset('assets/img/not_available.jpg'));

        $path = '/img/' . $dir . '/' . $fileName;

        if (str_contains($fileName, "default")) {
            $file = file_get_contents(asset('assets/img/' . $dir . '.jpg'));
            $type = Storage::mimeType(asset('assets/img/' . $dir . '.jpg'));
        } else if (Storage::disk('public')->exists($path)) {
            $file = Storage::disk('public')->get($path);
            $type = Storage::mimeType($path);
        }

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}

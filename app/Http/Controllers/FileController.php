<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    //

    public function uploadfiles(Request $request)
    {
        if ($file = $request->file('file')) {
            $image_name = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('images/' . $request->directory);
            if ($file->move($destinationPath, $image_name)) {
                return response()->json(['imageUrl' => url('/images/' . $request->directory.'/'.$image_name)]);
            }
        }
    }
}

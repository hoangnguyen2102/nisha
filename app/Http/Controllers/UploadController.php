<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    //
    public function up(Request $request)
    {
        $extension = $request->image->getClientOriginalExtension();
        $name = $request->image->getClientOriginalName();

        // Store
        $result = Storage::putFileAs('public/article_image', $request->image, $name);

        // Config path
        $result = str_replace('public/', '', $result);
        $result = url('storage/'.$result);

        // Return result
        // Generate response.
        return response()->json(['link' => $result]);
//        $validator = Validator::make($request->all(), [
//            'data' =>   'required|image|max:512',
//        ]);
    }

    public function test()
    {
        return view('test');
    }
}

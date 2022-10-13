<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
    public function store(Request $request) {
        $request->validate([
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $name = $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->store('public/images');

        $save = new Photo;
        $save->name = $name;
        $save->path = $path;
        $save->save();
        
        return response()->json(['image'=> url(Storage::url($path))]);
    } 
}

<?php

namespace App\Http\Controllers;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about(){
        $about = About::where('id', 1)->first();
        return response()->json($about);
    }

    public function edit($id, Request $request){

        $about = About::find($id);
        $about->description = $request-> input('description');
        $about ->save();
        return $about;
    }
}

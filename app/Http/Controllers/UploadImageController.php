<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadImageController extends Controller
{
    public function index()
    {
      return view('imageUpload');
    }

    public function store(Request $request)
    {
      $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:1024',
        ]);
    
        $imageName = time().'.'.$request->image->extension();
     
        $request->image->move(public_path('covers'), $imageName);
    
        return redirect()->back()->with('success','Nuotrauka įkelta')->with('image',$imageName);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Gallery;

class GalleriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::all();
        return view('admin.galleries.index')->with('galleries',$galleries);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|mimes:jpeg,jpg,bmp,png',
        ]);

        if($request->hasFile('image')){
            //get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
          //File name to Store 
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //Upload Image
          $path = $request->file('image')->storeAs('public/gallery',$fileNameToStore);
            }    else {
              $fileNameToStore = 'noimage.jpg';
            }

        $gallery = new Gallery();
        $gallery->image = $fileNameToStore;
        $gallery->save();
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $gallery = Gallery::find($id);
        return view('admin.galleries.edit')->with('gallery',$gallery);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $gallery = Gallery::find($id);
        if($request->hasFile('image')){
            //get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            //Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
          //File name to Store 
          $fileNameToStore = $filename.'_'.time().'.'.$extension;
          //Upload Image
          $path = $request->file('image')->storeAs('public/gallery',$fileNameToStore);
        }   

        if($request->hasFile('image')){
            if ($gallery->image != 'noimage.jpg') {
            Storage::delete('public/gallery/' . $gallery->image);
            }
             $gallery->image = $fileNameToStore;
        }
        $gallery->save();
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        if($gallery->image != 'noimage.jpg'){
            //Delete Image
              Storage::delete('public/gallery/'.$gallery->image);
         }
        $gallery->delete();
        return redirect()->route('admin.galleries.index')->with('success', 'Gallery has been deleted.');
    }
}

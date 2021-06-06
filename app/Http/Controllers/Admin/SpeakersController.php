<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Speaker;
use Illuminate\Support\Facades\Storage;

class SpeakersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speakers = Speaker::all();
        return view('admin.speakers.index')->with('speakers',$speakers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.speakers.create');
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
            'name' => 'required',
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
          $path = $request->file('image')->storeAs('public/speaker',$fileNameToStore);
            }    else {
              $fileNameToStore = 'noimage.jpg';
            }

        $speaker = new Speaker();
        $speaker->name = $request->name;
        $speaker->description = $request->description;
        $speaker->full_description = $request->full_description;
        $speaker->twitter = $request->twitter;
        $speaker->facebook =$request->facebook;
        $speaker->linkedin = $request->linkedin;
        $speaker->googleplus = $request->googleplus;
        $speaker->image = $fileNameToStore;
        $speaker->save();
        return redirect()->route('admin.speakers.index')->with('success', 'Speaker has been added.');
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
        $speaker = Speaker::find($id);
        return view('admin.speakers.edit')->with('speaker',$speaker);
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
            'name' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $speaker = Speaker::find($id);
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
          $path = $request->file('image')->storeAs('public/speaker',$fileNameToStore);
        }   

        $speaker->name = $request->name;
        $speaker->description = $request->description;
        $speaker->full_description = $request->full_description;
        $speaker->twitter = $request->twitter;
        $speaker->facebook =$request->facebook;
        $speaker->linkedin = $request->linkedin;
        $speaker->googleplus = $request->googleplus;
        if($request->hasFile('image')){
            if ($speaker->image != 'noimage.jpg') {
            Storage::delete('public/speaker/' . $speaker->image);
            }
             $speaker->image = $fileNameToStore;
        }
        $speaker->save();
        return redirect()->route('admin.speakers.index')->with('success', 'Speaker has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $speaker = Speaker::find($id);
        if($speaker->image != 'noimage.jpg'){
            //Delete Image
              Storage::delete('public/speaker/'.$speaker->image);
         }
        $speaker->delete();
        return redirect()->route('admin.speakers.index')->with('success', 'Speaker has been deleted.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Hotel;

class HotelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hotels = Hotel::all();
        return view('admin.hotels.index')->with('hotels',$hotels);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.hotels.create');
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
            'address' => 'required',
            'description' => 'required',
            'rating' => 'required',
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
          $path = $request->file('image')->storeAs('public/hotel',$fileNameToStore);
            }    else {
              $fileNameToStore = 'noimage.jpg';
            }

        $hotel = new Hotel();
        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->description = $request->description;
        $hotel->rating = $request->rating;
        $hotel->image = $fileNameToStore;
        $hotel->save();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel has been added.');
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
        $hotel = Hotel::find($id);
        return view('admin.hotels.edit')->with('hotel',$hotel);
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
            'address' => 'required',
            'description' => 'required',
            'rating' => 'required',
            'image' => 'nullable|mimes:jpeg,jpg,bmp,png',
        ]);

        $image = $request->file('image');
        $hotel = Hotel::find($id);
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
          $path = $request->file('image')->storeAs('public/hotel',$fileNameToStore);
        }   

        $hotel->name = $request->name;
        $hotel->address = $request->address;
        $hotel->description = $request->description;
        $hotel->rating = $request->rating;
        if($request->hasFile('image')){
            if ($hotel->image != 'noimage.jpg') {
            Storage::delete('public/hotel/' . $hotel->image);
            }
             $hotel->image = $fileNameToStore;
        }
        $hotel->save();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hotel = Hotel::find($id);
        if($hotel->image != 'noimage.jpg'){
            //Delete Image
              Storage::delete('public/hotel/'.$hotel->image);
         }
        $hotel->delete();
        return redirect()->route('admin.hotels.index')->with('success', 'Hotel has been deleted.');
    }
}

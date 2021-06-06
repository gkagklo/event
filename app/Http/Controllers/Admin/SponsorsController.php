<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Sponsor;

class SponsorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index')->with('sponsors',$sponsors);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sponsors.create');
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
          $path = $request->file('image')->storeAs('public/sponsor',$fileNameToStore);
            }    else {
              $fileNameToStore = 'noimage.jpg';
            }

        $sponsor = new Sponsor();
        $sponsor->name = $request->name;
        $sponsor->image = $fileNameToStore;
        $sponsor->save();
        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor has been added.');
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
        $sponsor = Sponsor::find($id);
        return view('admin.sponsors.edit')->with('sponsor',$sponsor);
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
        $sponsor = Sponsor::find($id);
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
          $path = $request->file('image')->storeAs('public/sponsor',$fileNameToStore);
        }   

        $sponsor->name = $request->name;
        if($request->hasFile('image')){
            if ($sponsor->image != 'noimage.jpg') {
            Storage::delete('public/sponsor/' . $sponsor->image);
            }
             $sponsor->image = $fileNameToStore;
        }
        $sponsor->save();
        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sponsor = Sponsor::find($id);
        if($sponsor->image != 'noimage.jpg'){
            //Delete Image
              Storage::delete('public/sponsor/'.$sponsor->image);
         }
        $sponsor->delete();
        return redirect()->route('admin.sponsors.index')->with('success', 'Sponsor has been deleted.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Amenity;

class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $amenities = Amenity::all();
        return view('admin.amenities.index')->with('amenities',$amenities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.amenities.create');
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
            'name' => 'required|unique:amenities',
        ]);

        $amenity = new Amenity();
        $amenity->name = $request->name;
        $amenity->save();
        return redirect()->route('admin.amenities.index')->with('success', 'Amenity has been added.');
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
        $amenity = Amenity::find($id);
        return view('admin.amenities.edit')->with('amenity',$amenity);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id=null)
    {
        $this->validate($request,[
            'name' => 'required|unique:amenities',
        ]);

        $amenity = Amenity::find($id); 
        $amenity->name = $request->name;
        $amenity->save();
        return redirect()->route('admin.amenities.index')->with('success', 'Amenity has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $amenity = Amenity::find($id);
        $amenity->delete();
        return redirect()->route('admin.amenities.index')->with('success', 'Amenity has been deleted.');
    }
}

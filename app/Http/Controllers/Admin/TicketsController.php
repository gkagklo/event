<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ticket;
use App\Amenity;

class TicketsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('admin.tickets.index')->with('tickets',$tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $amenities = Amenity::all()->pluck('name', 'id');
        return view('admin.tickets.create', compact('amenities'));
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
            'price' => 'required', 
            'stock' => 'required', 
            'amenities' => 'required|array', 
            'amenities.*' => 'integer',   
        ]);

        $ticket = new Ticket();
        $ticket->name = $request->name;
        $ticket->price = $request->price;
        $ticket->stock = $request->stock;
        $ticket->save();
        $ticket->amenities()->sync($request->input('amenities', []));
       
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket has been added.');
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
        $amenities = Amenity::all()->pluck('name', 'id');
        $ticket = Ticket::find($id);
        return view('admin.tickets.edit', compact('amenities', 'ticket'));
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
            'price' => 'required', 
            'stock' => 'required', 
            'amenities' => 'required|array', 
            'amenities.*' => 'integer',  
        ]);

 
        $ticket = Ticket::find($id); 
        $ticket->name = $request->name;
        $ticket->price = $request->price;
        $ticket->stock = $request->stock;
        $ticket->save();
        $ticket->amenities()->sync($request->input('amenities', []));
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        $ticket->delete();
        return redirect()->route('admin.tickets.index')->with('success', 'Ticket has been deleted.');
    }
}

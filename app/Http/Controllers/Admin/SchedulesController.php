<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Speaker;
use App\Schedule;

class SchedulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = Schedule::all();
        return view('admin.schedules.index')->with('schedules' , $schedules);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $speakers = Speaker::all();
        return view('admin.schedules.create')->with('speakers',$speakers);
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
            'day_number' => 'required',
            'start_time' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'speaker' => 'required',         
        ]);

        $schedule = new Schedule();
        $schedule->speaker_id = $request->speaker;
        $schedule->day_number = $request->day_number;
        $schedule->start_time = $request->start_time;
        $schedule->title = $request->title;
        $schedule->subtitle = $request->subtitle;
        $schedule->save();
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule has been added.');
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
        $schedule = Schedule::find($id);
        $speakers = Speaker::all();
        return view('admin.schedules.edit')->with(['schedule' => $schedule, 'speakers' => $speakers]);
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
            'day_number' => 'required',
            'start_time' => 'required',
            'title' => 'required',
            'subtitle' => 'required',
            'speaker' => 'required',  
        ]);

        $schedule = Schedule::find($id);
        $schedule->speaker_id = $request->speaker;
        $schedule->day_number = $request->day_number;
        $schedule->start_time = $request->start_time;
        $schedule->title = $request->title;
        $schedule->subtitle = $request->subtitle;
        $schedule->save();
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $schedule = Schedule::find($id);
        $schedule->delete();
        return redirect()->route('admin.schedules.index')->with('success', 'Schedule has been deleted.');
    }
}

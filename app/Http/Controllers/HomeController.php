<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Speaker;
use App\Sponsor;
use App\Faq;
use App\Gallery;
use App\Hotel;
use App\Schedule;
use App\Setting;
use App\Ticket;
use App\Amenity;





class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $speakers = Speaker::all();
        $sponsors = Sponsor::all();
        $faqs = Faq::all();
        $galleries = Gallery::all();
        $hotels = Hotel::all();
        $schedules = Schedule::with('speaker')
        ->orderBy('start_time', 'asc')
        ->get()
        ->groupBy('day_number');
        $settings = Setting::pluck('value', 'key');
        $tickets = Ticket::with('amenities')->get();
        $amenities = Amenity::with('tickets')->get();
        return view('welcome')->with(['speakers' => $speakers, 'sponsors' => $sponsors, 'faqs' => $faqs, 'galleries' => $galleries, 'hotels' => $hotels, 'schedules' => $schedules, 'settings' => $settings, 'tickets' => $tickets, 'amenities' => $amenities]);
    }


    public function speaker($id = null){
        $speakerDetails = Speaker::where('id',$id)->first();
        return view('speaker')->with('speakerDetails',$speakerDetails);
    }




}

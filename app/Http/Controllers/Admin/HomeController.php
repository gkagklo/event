<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Speaker;
use App\Schedule;
use App\Hotel;
use App\Gallery;
use App\Sponsor;
use App\Faq;
use App\Amenity;
use App\Ticket;
use App\Checkout;
use App\Setting;
use App\User;
use App\Role;
use App\Contact;
use App\Subscriber;

class HomeController extends Controller
{
    public function index(){
        $speakers = Speaker::all();
        $schedules = Schedule::all();
        $hotels = Hotel::all();
        $galleries = Gallery::all();
        $sponsors = Sponsor::all();
        $faqs = Faq::all();
        $amenities = Amenity::all();
        $tickets = Ticket::all();
        $checkouts = Checkout::all();
        $settings = Setting::all();
        $users = User::all();
        $roles = Role::all();
        $contacts = Contact::all();
        $subscribers = Subscriber::all();
        return view('admin.home',compact('speakers','hotels','schedules','galleries','sponsors','faqs','amenities','tickets','checkouts','settings','users','roles','contacts','subscribers'));
    }
}

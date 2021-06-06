<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function subscriber(Request $request){
        $this->validate($request,[
            'mail' => 'required|email|unique:subscribers',
        ]);
    
        $subscriber = new Subscriber();
        $subscriber->mail = $request->mail;
        $subscriber->save();
        Toastr::success('Υou have successfully subscribe!');
        return redirect()->back();
       }
}

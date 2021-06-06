<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function index(){
        $subscribers = Subscriber::all();
        return view('admin.subscribers.index',compact('subscribers'));
    }

    public function destroy($id){
        $subscriber = Subscriber::find($id);
        $subscriber->delete();
        return redirect()->route('admin.subscribers.index')->with('success', 'Subscriber has been deleted');
    }

}

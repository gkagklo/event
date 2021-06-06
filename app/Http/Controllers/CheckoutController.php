<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Mail;
use App\Mail\CheckoutConfirmed;
use App\Checkout;
use App\Ticket;

class CheckoutController extends Controller
{
    public function checkout(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'qty' => 'required',
            'ticket' => 'required',
        ]);

        $checkout = new Checkout();
        $checkout->name = $request->name;
        $checkout->lastname = $request->lastname;
        $checkout->email = $request->email;
        $checkout->phone = $request->phone;
        $checkout->qty = $request->qty;
        $checkout->ticket = $request->ticket;
       
       
        $ticket = Ticket::where(['name' => $checkout->ticket])->first();

        if($checkout->qty > $ticket->stock){
        Toastr::warning('Ticket out of stock');
        return redirect()->back();
        }

        else{

     
        $ticket->stock = $ticket->stock - $checkout->qty ;
        $ticket->save();

        $checkout->total = $checkout->qty * $ticket->price;
        $checkout->save();

        //Send Checkout Email
        $email = $checkout->email;
        $name = $checkout->name;
        $messageData = ['email' => $email,'name' => $name,'code'=>base64_encode($email)];
        Mail::send('emails.checkout',$messageData,function($message) use($email){
        $message->to($email)->subject('Checkout confirmed');  });

        Toastr::success('Checkout has been sent successfully');
        return redirect()->back();

        }

    }




}

<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Checkout;

class CheckoutController extends Controller
{
    public function index(){
        $checkouts = Checkout::all();
        return view('admin.checkouts.index',compact('checkouts'));
    }


    public function destroy($id){
        $checkout = Checkout::find($id);
        $checkout->delete();
        return redirect()->route('admin.checkouts.index')->with('success', 'Checkout has been deleted.');
    }
}

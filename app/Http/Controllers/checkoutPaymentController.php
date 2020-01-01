<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class checkoutPaymentController extends Controller
{
    public function index(Request $request){
    	return view('checkout');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class POrderController extends Controller
{
    public function createOrder(){
        return view('createOrder');
    }

    public function storeOrder(Request $request){
        return $request;
    }
}

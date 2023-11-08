<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SKUController extends Controller
{
    public function viewSku(){
        return view('addSKU');
    }
}

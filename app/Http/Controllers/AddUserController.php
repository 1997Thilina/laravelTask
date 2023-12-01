<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use Illuminate\Http\Request;

class AddUserController extends Controller
{
    public function addUser(){
        
         $t = Territory::all();
        
        // $r=Region::all();
        return view('addUser', compact('t'));
    }

    public function storeUser(Request $request){
        return $request;
    }

    public function adminDashboard(){
        return view('adminDashboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddUserController extends Controller
{
    public function addUser(){
        return view('addUser');
    }

    public function storeUser(Request $request){
        return $request;
    }

    public function adminDashboard(){
        return view('adminDashboard');
    }
}

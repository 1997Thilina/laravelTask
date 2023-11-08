<?php

namespace App\Http\Controllers;

use App\Models\Territory;
use Illuminate\Http\Request;

class TerritoryController extends Controller
{
    public function viewTerritory(){
        return view('addTerritory');
    }

    public function storeTerritory(Request $request){
        $territory = new Territory();
        $territory-> zone =$request-> zone;
        $territory-> region =$request-> region;
        //$territory-> territory_code =$request-> territory_code;
        $territory-> territory_name =$request-> territory_name;
        $territory->save();
        return $request;
    }
}

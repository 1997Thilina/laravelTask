<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Territory;
use App\Models\Zone;
use Illuminate\Http\Request;

class TerritoryController extends Controller
{
    public function viewTerritory(){
        $znr=Region::all();
        $z=Zone::all();
        $tr=Territory::all();
        return view('addTerritory',compact(['znr','tr','z']));
    }

    public function storeTerritory(Request $request)
    {
        // Define validation rules
        $rules = [
            'zone' => 'required',
            'region' => 'required',
            'territory_name' => 'required|unique:territories', // Check uniqueness based on territory_name
        ];
    
        // Define custom error messages (optional)
        $messages = [
            'territory_name.unique' => 'The territory name already exists.',
        ];
    
        // Validate the request data
        $request->validate($rules, $messages);
    
        // If validation passes, create and save the Territory model
        $territory = new Territory();
        $territory->zone = $request->zone;
        $territory->region = $request->region;
        $territory->territory_name = $request->territory_name;
        $territory->save();
    
        return 'Territory added successfully';
    }
    
}

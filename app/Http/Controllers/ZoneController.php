<?php

namespace App\Http\Controllers;

use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ZoneController extends Controller
{
    public function viewZone(){
        $zone = Zone::all();
        return view('addZone',compact('zone'));
    }

    public function storeZone(Request $request){
        $rules=[
            'zone_long_description'=>'required|string'
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator ->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $zone = new Zone();
        $zone-> zone_long_description =$request-> zone_long_description;
        $zone-> short_description =$request-> short_description;
        $zone->save();
        return 'zone added successfully';
    }


}

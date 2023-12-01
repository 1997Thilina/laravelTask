<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Zone;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function viewRegion(){
        $zones=Zone::all();
        $znr=Region::all();
        //$tr=Territory::all();
        return view('addRegion',compact(['zones','znr']));
    }

    public function storeRegion(Request $request){
        $region = new Region();
        $region-> zone =$request-> zone;
        $region-> region_code =$request-> region_code;
        $region-> region_name =$request-> region_name;
        $region->save();
        return 'Region added successfullly';
    }
}

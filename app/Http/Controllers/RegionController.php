<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;

class RegionController extends Controller
{
    public function viewRegion(){
        return view('addRegion');
    }

    public function storeRegion(Request $request){
        $region = new Region();
        $region-> zone =$request-> zone;
        $region-> region_code =$request-> region_code;
        $region-> region_name =$request-> region_name;
        $region->save();
        return $request;
    }
}

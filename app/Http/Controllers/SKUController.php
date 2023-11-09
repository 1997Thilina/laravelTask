<?php

namespace App\Http\Controllers;

use App\Models\SKU;
use Illuminate\Http\Request;

class SKUController extends Controller
{
    public function viewSku(){
        return view('addSKU');
    }

    public function skustore(Request $request){
    

        // $validator = Validator::make($request->all(),$rules);
        // if($validator ->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        
        $sku_add = new SKU();
        $sku_add-> sku_name =$request-> sku_name;
        $sku_add-> mrp =$request-> mrp;
        $sku_add-> dPrice =$request-> dPrice;
        $sku_add-> quantity =$request-> quantity;
        $sku_add-> wov =$request-> wov;
        $sku_add->save();
        return 'Sku added Successfully';
    }
}

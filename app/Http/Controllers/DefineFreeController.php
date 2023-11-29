<?php

namespace App\Http\Controllers;

use App\Models\DefineFree;
use App\Models\PlaceFreeOrder;
use App\Models\SKU;
use Illuminate\Http\Request;

class DefineFreeController extends Controller
{
    public function viewDefineFree(){
        $sku=SKU::all();
        $skuId = SKU::pluck('id');
        $free_define=DefineFree::all();
        

        //return $sku;

        return view('defineFree',compact(['sku', 'free_define','skuId']));
    }
    

    public function addDefineFree(Request $request){
        //return $request;
        
    

        // $validator = Validator::make($request->all(),$rules);
        // if($validator ->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        
        $freeOrder_add = new DefineFree();
        $freeOrder_add-> free_label =$request-> free_label;
        $freeOrder_add-> type =$request-> type;
        $freeOrder_add-> product =$request-> product;
        $freeOrder_add-> sku_id =$request-> sku_id;
        $freeOrder_add-> unit_price =$request-> unit_price;
        //$freeOrder_add-> free_product =$request-> free_product;
        $freeOrder_add-> purchase_quantity =$request-> purchase_quantity;
        $freeOrder_add-> free_quantity =$request-> free_quantity;
        $freeOrder_add-> lower_limit =$request-> lower_limit;
        $freeOrder_add-> upper_limit =$request-> upper_limit;
        $freeOrder_add->save();
        return 'freeIssue added Successfully';
    }
}

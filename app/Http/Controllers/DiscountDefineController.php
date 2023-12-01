<?php

namespace App\Http\Controllers;

use App\Models\DiscountDefine;
use App\Models\SKU;
use Illuminate\Http\Request;

class DiscountDefineController extends Controller
{
    public function viewDiscountDefine(){
        $sku=SKU::all();
        $skuId = SKU::pluck('id');
        $discount_define=DiscountDefine::all();
        

        //return $sku;

        return view('discountDefine',compact(['sku', 'discount_define','skuId']));
    }
    

    public function addDiscount(Request $request){
        //return $request;
        
    

        // $validator = Validator::make($request->all(),$rules);
        // if($validator ->fails()){
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }
        
        $discountOrder_add = new DiscountDefine();
        $discountOrder_add-> discount_label =$request-> discount_label;
        //$discountOrder_add-> type =$request-> type;
        $discountOrder_add-> product =$request-> product;
        $discountOrder_add-> sku_id =$request-> sku_id;
        $discountOrder_add-> unit_price =$request-> unit_price;
        //$discountOrder_add-> free_product =$request-> free_product;
        //$discountOrder_add-> purchase_quantity =$request-> purchase_quantity;
        $discountOrder_add-> discount =$request-> discount;
        $discountOrder_add-> lower_limit =$request-> lower_limit;
        //$discountOrder_add-> upper_limit =$request-> upper_limit;
        $discountOrder_add->save();
        return 'discount added Successfully';
    }
}

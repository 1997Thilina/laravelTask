<?php

namespace App\Http\Controllers;

use App\Models\DefineFree;
use App\Models\PlaceFreeOrder;
use App\Models\SKU;
use App\Models\User;
use Illuminate\Http\Request;

class PlaceFreeOrderController extends Controller
{
    public function ViewcreateOrderFree(){
        $sku=SKU::all();
        $user=User::all();
        $free_define=DefineFree::all();
        
        $order=PlaceFreeOrder::all();
        
        //$name = array($t, $z, $r);
        //return compact('free_define');

        return view('createOrderFree', compact(['sku','user','free_define','order']));
    }

    public function storeFreeOrder(Request $request){
        return $request;
        
        $data = $request->all();

        $customerName = $data['customer_name'];
        $bulkId = $data['bulk_id'];
        $productNames = $data['product_name'];
        $productCodes = $data['product_code'];
        $prices = $data['price'];
        $enQty = $data['en_qty'];
        $freeQty =$data['free_qty'];
        $amounts = $data['amount'];

        foreach ($enQty as $key => $qty) {
            // Check if en_qty and amount are not null
            if ($qty !== null && $amounts[$key] !== null) {

                $order_add = new PlaceFreeOrder();
                // $order_add-> customer_name =$request-> customer_name;
                // $order_add-> product_name =$request-> product_name;
                // $order_add-> product_code =$request-> product_code;
                // $order_add-> price =$request-> price;
                // $order_add-> en_qty =$request-> en_qty;
                // //$order_add-> quantity =$request-> quantity;
                // $order_add-> free_qty =$request-> free_qty;
                // $order_add-> amount =$request-> amount;
                // $order_add->save();

                
                $order_add->customer_name = $customerName;
                $order_add->bulk_id = $bulkId;
                $order_add->product_name = $productNames[$key];
                $order_add->product_code = $productCodes[$key];
                $order_add-> price = $prices[$key];
                $order_add->en_qty = $qty;
                $order_add-> free_qty = $freeQty[$key];
                $order_add->amount = $amounts[$key];
                $order_add->save();
            }
        }
        //return $order_add;
        return 'order added Successfully';
        
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\POrder;
use App\Models\Region;
use App\Models\SKU;
use App\Models\Territory;
use App\Models\Zone;
use Illuminate\Http\Request;

class POrderController extends Controller
{
    public function createOrder(){
        $sku=SKU::all();
        $t = Territory::all();
        $z=Zone::all();
        $r=Region::all();
        //$name = array($t, $z, $r);

        return view('createOrder', compact('sku'), compact('t'));
    }

    public function viewOrder(){
        $order=POrder::all();
        // $t = Territory::all();
        // $z=Zone::all();
        // $r=Region::all();
        // //$name = array($t, $z, $r);

        return view('orders', compact('order'));
    }

    public function storeOrder(Request $request){
        
        $order_add = new POrder();
        $order_add-> zone =$request-> zone;
        $order_add-> region =$request-> region;
        $order_add-> territory =$request-> territory;
        $order_add-> distributor =$request-> distributor;
        //$order_add-> quantity =$request-> quantity;
        $order_add-> remark =$request-> remark;
        $order_add->save();
        return 'order added Successfully';
        //return $request;
    }
}

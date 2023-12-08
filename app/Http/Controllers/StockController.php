<?php

namespace App\Http\Controllers;

use App\Models\SKU;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function viewStockMaintaince(){
        $sku=SKU::all();
        return view('stockMaintaince', compact('sku'));
    }

    public function addStockMaintaince(Request $request){
        //return $request;
        
        $data = $request->all();

        
        $productCodes = $data['product_id'];
        $remainingQuantity = $data['total_qty'];

         foreach ($remainingQuantity as $key => $rmq) {
             if ($rmq !== null) {
                 //$qty_update = new SKU();
                 SKU::where('id', $productCodes[$key])->update([
                'quantity' => $rmq,
              
            ]);
            }
         }
        //return $order_add;
        return redirect()->route('view.viewStockMaintaince')->with('success', 'stock Successfully added.');
        
    }
}

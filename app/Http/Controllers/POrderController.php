<?php

namespace App\Http\Controllers;

use App\Models\PlaceFreeOrder;
use App\Models\POrder;
use App\Models\Region;
use App\Models\SKU;
use App\Models\Territory;
use App\Models\User;
use App\Models\Zone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

//use Barryvdh\DomPDF\PDF;

class POrderController extends Controller
{
    public function createOrder(){
        $sku=SKU::all();
        $t = Territory::all();
        $z=Zone::all();
        $r=Region::all();
        $pOrder = POrder::all();
        //$name = array($t, $z, $r);
        //return compact(['sku','t', 'z']);
        

        return view('createOrder', compact(['sku','t','pOrder']));
    }

    public function viewOrder(Request $request){
        $order=PlaceFreeOrder::all();
        $z= Zone::all();
        $r = Region::all();
        $t = Territory::all();
        $user=User::all();
        
        // $joinOrder = PlaceFreeOrder::join('users', 'place_free_orders.customer_name', '=', 'users.name' )
        // ->get(['place_free_orders.*', 'users.*']);
        // return $joinOrder;
        //return $request;

        $query=DB::table('users')
            ->join('place_free_orders', 'users.name', '=', 'place_free_orders.customer_name')
            ->join('territories', 'users.territory', '=', 'territories.territory_name')
            ->select(
                'users.name as user_name',
                'place_free_orders.customer_name as customer_name',
                'territories.region as region',
                'territories.territory_name as territory_name',
                'place_free_orders.bulk_id as bulk_id',
                'place_free_orders.amount as amount',
                'place_free_orders.created_at as date',
            );
            
            if ($request->has('zone')) {
                $query->where('territories.zone', $request->input('zone'));
            }
       
        if ($request->has('region')) {
            $query->where('territories.region', $request->input('region'));
        }
        
    
        if ($request->has('territory')) {
            $query->where('territories.territory_name', $request->input('territory'));
        }
            
            //  if($request->input('customer') != null){
            if ($request->has('customer')) {
                $query->where('place_free_orders.customer_name', $request->input('customer'));
            }

             if($request-> bulk_id != null){
            if ($request->has('bulk_id')) {
                $query->where('place_free_orders.bulk_id', $request->input('bulk_id'));
            }}

            if($request-> from_date != null || $request-> to_date != null ){
            if ($request->has('from_date') && $request->has('to_date')) {
                $query->whereBetween('place_free_orders.created_at', [$request->input('from_date'), $request->input('to_date')]);
            }}
             
            
            
            $result = $query->get();
            //return $result;

        return view('orders', compact(['result','z','r','t','user']));
    }
    ##############################################################################

    public function viewOrderDetails(){
        $order=PlaceFreeOrder::all();
        $z= Zone::all();
        $r = Region::all();
        $t = Territory::all();
        $user=User::all();
        
        // $joinOrder = PlaceFreeOrder::join('users', 'place_free_orders.customer_name', '=', 'users.name' )
        // ->get(['place_free_orders.*', 'users.*']);
        // return $joinOrder;

        $resultDetails=DB::table('users')
            ->join('place_free_orders', 'users.name', '=', 'place_free_orders.customer_name')
            ->join('territories', 'users.territory', '=', 'territories.territory_name')
            ->select(
                'users.name as user_name',
                'place_free_orders.customer_name as customer_name',
                'territories.region as region',
                'territories.territory_name as territory_name',
                'place_free_orders.bulk_id as bulk_id',
                'place_free_orders.amount as amount',
                'place_free_orders.created_at as date',

                'place_free_orders.product_name as product_name',
                'place_free_orders.product_code as product_code',
                'place_free_orders.en_qty as en_qty',
                'place_free_orders.price as price',
                'place_free_orders.discount as discount',
                'place_free_orders.free_qty as free_qty',
                'place_free_orders.amount as amount',
            )
            ->get();
            //return $resultDetails;

        return view('orderDetails', compact('resultDetails'));
    }

    public function storeOrder(Request $request){
        
        //return $request;
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

    public function downloadOrderDetails(Request $request){
        //return $request;
        //$orders=PlaceFreeOrder::all();
        $checkedArray = $request->input('checkedArray');

        // Convert the comma-separated values to an array
        $bulkIds = explode(',', $checkedArray);

        // Filter orders based on bulkIds
        $orders = PlaceFreeOrder::whereIn('bulk_id', $bulkIds)->get();

        //return $orders;
        $filePath = public_path('/export.csv'); // Example path, adjust as needed

        $handle = fopen($filePath, 'w');

        // Write CSV header
        fputcsv($handle, array_keys($orders->first()->toArray()), ';');

        foreach ($orders as $row) {
            fputcsv($handle, $row->toArray(), ';');
        }

        fclose($handle);

        // Send HTTP headers for download
        return response()->download($filePath)->deleteFileAfterSend(true);
        return redirect()->route('order.view');
        }


        public function viewOrderAll(){
            $order=PlaceFreeOrder::all();
            $z= Zone::all();
            $r = Region::all();
            $t = Territory::all();
            $user=User::all();
            
            // $joinOrder = PlaceFreeOrder::join('users', 'place_free_orders.customer_name', '=', 'users.name' )
            // ->get(['place_free_orders.*', 'users.*']);
            // return $joinOrder;
    
            $user=DB::table('users')
                ->join('place_free_orders', 'users.name', '=', 'place_free_orders.customer_name')
                ->join('territories', 'users.territory', '=', 'territories.territory_name')
                ->select(
                    'users.name as user_name',
                    'place_free_orders.customer_name as customer_name',
                    'territories.region as region',
                    'territories.territory_name as territory_name',
                    'place_free_orders.bulk_id as bulk_id',
                    'place_free_orders.amount as amount',
                    'place_free_orders.created_at as date',
                )
                ->get();
                //return $result;
    
            return view('orders', compact(['result','z','r','t','user']));
        }

        // public function invoice()
        // {  
        //     $order=PlaceFreeOrder::all();
        // $z= Zone::all();
        // $r = Region::all();
        // $t = Territory::all();
        // $user=User::all();
        
        // // $joinOrder = PlaceFreeOrder::join('users', 'place_free_orders.customer_name', '=', 'users.name' )
        // // ->get(['place_free_orders.*', 'users.*']);
        // // return $joinOrder;

        // $data=DB::table('users')
        //     ->join('place_free_orders', 'users.name', '=', 'place_free_orders.customer_name')
        //     ->join('territories', 'users.territory', '=', 'territories.territory_name')
        //     ->select(
        //         'users.name as user_name',
        //         'place_free_orders.customer_name as customer_name',
        //         'territories.region as region',
        //         'territories.territory_name as territory_name',
        //         'place_free_orders.bulk_id as bulk_id',
        //         'place_free_orders.amount as amount',
        //         'place_free_orders.created_at as date',

        //         'place_free_orders.product_name as product_name',
        //         'place_free_orders.product_code as product_code',
        //         'place_free_orders.en_qty as en_qty',
        //         'place_free_orders.price as price',
        //         'place_free_orders.discount as discount',
        //         'place_free_orders.free_qty as free_qty',
        //         'place_free_orders.amount as amount',
        //     )->get();
        //     // $dataQuery=$data->whereIn('bulk_id', ['3'])->get();
        //     return $data;
            

        //     $resultDetails = [
        //         'resultDetails' => $data,
        //     ];
        //     $pdf = Pdf::loadView('orderDetails',$resultDetails);
        //      return $pdf->download('invoice.pdf');
        // }


        public function generatePDF(Request $request)
        {  
        
        $order=PlaceFreeOrder::all();
        $z= Zone::all();
        $r = Region::all();
        $t = Territory::all();
        $user=User::all();

        $checkedArray = $request->input('checkedArray');

        // Convert the comma-separated values to an array
        $bulkIds = explode(',', $checkedArray);
        //return $bulkIds;
        
        // $joinOrder = PlaceFreeOrder::join('users', 'place_free_orders.customer_name', '=', 'users.name' )
        // ->get(['place_free_orders.*', 'users.*']);
        // return $joinOrder;

        $details=DB::table('users')
            ->join('place_free_orders', 'users.name', '=', 'place_free_orders.customer_name')
            ->join('territories', 'users.territory', '=', 'territories.territory_name')
            ->select(
                'users.name as user_name',
                'place_free_orders.customer_name as customer_name',
                'territories.region as region',
                'territories.territory_name as territory_name',
                'place_free_orders.bulk_id as bulk_id',
                'place_free_orders.amount as amount',
                'place_free_orders.created_at as date',

                'place_free_orders.product_name as product_name',
                'place_free_orders.product_code as product_code',
                'place_free_orders.en_qty as en_qty',
                'place_free_orders.price as price',
                'place_free_orders.discount as discount',
                'place_free_orders.free_qty as free_qty',
                'place_free_orders.amount as amount',
            )
            
            ->whereIn('place_free_orders.bulk_id', $bulkIds)->get();
            //$orders =$resultDetails;
            //return $details;
            // $dataQuery=$data->whereIn('bulk_id', ['3'])->get();
            //$found = false;
            //$pdf = app(Pdf::class);
            $pdf = App::make('dompdf.wrapper');
            //  foreach ($details as $resultDetails) {
            //     // Load the Blade view for the invoice
            //     $invoiceView = view('invoice', compact('resultDetails'))->render();
    
            //     // Add the invoice to the PDF on a new page
            //     //$pdf->addPage();
            //     $pdf->loadView($invoiceView);
            //     $pdf->render();

            // }
            $pdf->loadView('invoice',compact(['details','checkedArray']))->setPaper('a4', 'portrait');
            $pdf->setOptions(['margin-top' => 0, 'margin-right' => 0, 'margin-bottom' => 0, 'margin-left' => 0]);
            // Pdf::loadHTML($html)->setPaper('a3', 'portrait')->setWarnings(false)->save('myfile.pdf')
            return $pdf->stream();
    
            // Output or download the PDF
            //return $pdf->output('invoices.pdf');
        }


}

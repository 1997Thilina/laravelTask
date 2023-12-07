<?php

namespace App\Http\Controllers;

use App\Models\SKU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use League\Csv\Writer;

class CsvAddSkuController extends Controller
{
    public function exportSampleCsv()
    {
        // Get the table name from your model

        $headings = ['sku_name', 'mrp', 'dPrice', 'quantity','weight/volume'];

        // Create a new CSV writer instance
        $csv = Writer::createFromString('');

        // Insert the headings into the CSV
        $csv->insertOne($headings);

     
        // Generate a unique filename
        $filename = 'sample_sku_csv_structure.csv';
        

        // Save the CSV file to storage
        File::put(storage_path('app/public/' . $filename), $csv);

        // Download the file
        return Response::download(storage_path('app/public/' . $filename), $filename)->deleteFileAfterSend();
    }

    public function import(Request $request)
    {
        //return 'hi';
        $validator = Validator::make($request->all(), [
            'csv_file' => 'required|mimes:csv,txt',
        ]);

        if ($validator->fails()) {
            return redirect('/import')
                ->withErrors($validator)
                ->withInput();
        }

        $file = $request->file('csv_file');
        $path = $file->getRealPath();

        $data = array_map('str_getcsv', file($path));

        foreach ($data as $row) {
            if($row[0] !='sku_name' && $row[1] !='mrp'){

                $sku_add = new SKU();
                $sku_add-> sku_name =$row[0];
                $sku_add-> mrp =$row[1];
                $sku_add-> dPrice =$row[2];
                $sku_add-> quantity =$row[3];
                $sku_add-> wov =$row[4];
                $sku_add->save();
            }
            
        }

        return redirect('/sku')->with('success', 'Data imported successfully!');
    }

}

<?php

namespace App\Http\Controllers;

//use Barryvdh\DomPDF\PDF;
//use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf as PDF;



class InvoiceController extends Controller
{
    // public function invoice()
    // {
    //     $pdf = app('dompdf.wrapper');
    //     $pdf = PDF::loadView('orderDetails');
    //     return $pdf;
    //     return $pdf->download('techsolutionstuff.pdf');
    // }
    public function invoice()
    {
        return 'HI';
    }
}

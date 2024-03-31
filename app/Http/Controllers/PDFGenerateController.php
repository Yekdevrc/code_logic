<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Sale;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFGenerateController extends Controller
{
    public function index()
    {
        $sales=Sale::with('product', 'user')->get();

        $data=[
            'title'=> "Sales Tracking",
            'date'=> now(),
            'sales'=> $sales
        ];

        $pdf = Pdf::loadView('pdf.generate', $data);
        return $pdf->download('invoice.pdf');
    }
}

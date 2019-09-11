<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function gerarPdf(){

    	$pdf = PDF::loadView('/home/pdf');

    	return $pdf->setPaper('a4')->stream('Teste de PDF');
    }
}

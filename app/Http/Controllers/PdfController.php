<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PdfController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function getInvoice() 
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML(utf8_decode($view));
        return $pdf->stream('invoice');
    }

    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }

    public function getPrueba()
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        return view('pdf.invoice', compact('data', 'date', 'invoice'));    

    }
}

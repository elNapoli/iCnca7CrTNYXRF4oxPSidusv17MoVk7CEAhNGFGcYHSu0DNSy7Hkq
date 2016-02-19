<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Http\Request;
use App\Postulante;


class PdfController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function getInvoice(Guard $auth) 
    {
        $p = $this->getData($auth);
        $date = date('Y-m-d');
        $view =  \View::make('pdf.invoice', compact('p', 'date'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function getInvoiceDownload(Guard $auth) 
    {
        $p = $this->getData($auth);
        $date = date('Y-m-d');
        $view =  \View::make('pdf.invoice', compact('p', 'date'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('invoice');
    }

    public function getData($auth) 
    {
        $post = Postulante::where('user_id',$auth->id())->get(); //objeto post con informacion extra
        $postulante = Postulante::findOrFail($post[0]->id); //individualizo al postulante
        return $postulante;
    }

    public function getPrueba()
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        return view('pdf.invoice', compact('data', 'date', 'invoice'));    

    }
}

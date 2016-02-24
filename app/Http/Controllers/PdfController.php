<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;

use Illuminate\Http\Request;
use App\Postulante;
use Carbon\Carbon;


class PdfController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */

    //Nota a mi: Cuando no estemos cortos de tiempo mejorar el codigo para no repetir procedimientos xd


    public function getInvoice(Guard $auth) 
    {
        $p = $this->getData($auth);
        $date = date('Y-m-d');
        //calculo edad correcta
        $ma = Carbon::parse($date)->format('m'); //mes actual
        $da = Carbon::parse($date)->format('d'); //dia actual
        $mn = Carbon::parse($p->fecha_nacimiento)->format('m'); //mes nacimiento
        $dn = Carbon::parse($p->fecha_nacimiento)->format('d'); //dia nacimiento
        if($ma < $mn or ($ma == $mn and $da < $dn)){
            $edad = $date-$p->fecha_nacimiento-1;
        }
        else{$edad = $date-$p->fecha_nacimiento;}
        //fin calculo edad correcta

        $view =  \View::make('pdf.invoice', compact('p', 'date','edad'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }

    public function getInvoiceDownload(Guard $auth) 
    {
        $p = $this->getData($auth);
        $date = date('Y-m-d');
        //calculo edad correcta
        $ma = Carbon::parse($date)->format('m'); //mes actual
        $da = Carbon::parse($date)->format('d'); //dia actual
        $mn = Carbon::parse($p->fecha_nacimiento)->format('m'); //mes nacimiento
        $dn = Carbon::parse($p->fecha_nacimiento)->format('d'); //dia nacimiento
        if($ma < $mn or ($ma == $mn and $da < $dn)){
            $edad = $date-$p->fecha_nacimiento-1;
        }
        else{$edad = $date-$p->fecha_nacimiento;}
        //fin calculo edad correcta

        $view =  \View::make('pdf.invoice', compact('p', 'date','edad'));
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

    public function getHomologacion(Guard $auth)
    {
        $p = $this->getData($auth);
        $date = date('Y-m-d');
        $view =  \View::make('pdf.partials.homologacion', compact('p','date'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('homologacion');        
    }

    public function getAsistente(Guard $auth)
    {
        $p = $this->getData($auth);
        $date = date('Y-m-d');
        $view =  \View::make('pdf.partials.asistente', compact('p','date'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('homologacion');        
    }

    public function getLlegada(Guard $auth)
    {
        $p = $this->getData($auth);
        $date = date('Y-m-d');
        $view =  \View::make('pdf.partials.llegada', compact('p','date'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('homologacion');        
    }

    public function getContacto(Guard $auth)
    {
        $p = $this->getData($auth);
        $date = date('Y-m-d');
        $view =  \View::make('pdf.partials.contacto', compact('p','date'));
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('homologacion');        
    }
}

<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Continente;
use App\Pais;
use App\Ciudad;
use App\Procedencia;
use App\Genero;
use App\Postulante;
use App\Universidad;
use App\Funciones\DataGraphic;


class EstadisticasController extends Controller {

/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    public function getIndex()
    {
        $algo = new DataGraphic();
       
        $arrayFinal = array('name'=> 'Postulantes',
                            'size' => Postulante::all()->count(),
                            'children'=> $algo->recursiva('continente','1','asdf','m'));
        dd(json_encode($arrayFinal));
      
        
        /*$arrayFinal = array('name'=> 'Universidades',
                            'size' => Universidad::all()->count(),
                            'children'=> $algo->recursiva_universidad('continente','1','inicial'));
        dd(json_encode($arrayFinal));

        /*$arrayFinal = array('name'=> 'Postulantes',
                            'size' => Postulante::all()->count(),
                            'children'=> $algo->recursiva_estudio('tipo_estudio','1','inicio','inicio','inicio'));
        dd(json_encode($arrayFinal));*/
    }

    public function getUniversidades(){
        $algo = new DataGraphic();
       
        $arrayFinal = array('name'=> 'Universidades',
                            'size' => Universidad::all()->count(),
                            'children'=> $algo->recursiva_universidad('continente','1','inicial'));
        $json_u = json_encode($arrayFinal);
        $fp = fopen("json_universidad.json", "w");
        fputs($fp, $json_u);
        fclose($fp);
        $cant = Universidad::all()->count();
        return view('estadisticas.universidades',compact('cant'));
    }

    public function getPostByStudy(){
        $algo = new DataGraphic();

        $arrayFinal = array('name'=> 'Postulantes',
                            'size' => Postulante::all()->count(),
                            'children'=> $algo->recursiva_estudio('tipo_estudio','1','inicio','inicio','inicio'));
        $json_pbs = json_encode($arrayFinal);
        $fp = fopen("json_postbystudy.json", "w");
        fputs($fp, $json_pbs);
        fclose($fp);
        $cant = Postulante::all()->count();
        return view('estadisticas.postulante_academica',compact('cant'));
    }

    public function getPostByGeo(){
        $algo = new DataGraphic();

        $arrayFinal = array('name'=> 'Postulantes',
                            'size' => Postulante::all()->count(),
                            'children'=> $algo->recursiva('continente','1','asdf','m'));
        $json_pbg = json_encode($arrayFinal);
        $fp = fopen("json_postbygeo.json", "w");
        fputs($fp, $json_pbg);
        fclose($fp);
        $cant = Postulante::all()->count();
        return view('estadisticas.postulante_ubicacion',compact('cant'));
    }
  


}

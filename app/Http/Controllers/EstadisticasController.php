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
       /*

        $arrayFinal = array('name'=> 'Postulantes',
                            'size' => Postulante::all()->count(),
                            'children'=> $algo->recursiva('continente','1','asdf','m'));
        dd(json_encode($arrayFinal));
      
        $arrayFinal = array('name'=> 'Universidades',
                            'size' => Universidad::all()->count(),
                            'children'=> $algo->recursiva_universidad('continente','1','inicial'));

        dd(json_encode($arrayFinal));
        */

        $arrayFinal = array('name'=> 'Postulantes',
                            'size' => Postulante::all()->count(),
                            'children'=> $algo->recursiva_estudio('tipo_estudio','1','inicio','inicio','inicio'));

        dd(json_encode($arrayFinal));




	return view('estadisticas.index');
	}

    public function getPrueba(){



      //  dd(Ciudad::where('id','1')->first()->postulante()->where('sexo','f')->count());




        return view('estadisticas.grafico_05');
    }

    public function postGraficar(Request $request){

        switch ($request->get('filtro1')) {
            case '1':
                switch ($request->get('filtro2')) {
                    case '2':
                        # code...
                        $continente = Continente::gPaisesByContinente();
                        break;

                    case '11':
                        # code...
                        $continente = Continente::gPostulantesByContinente();
                        break;  
                    case '3':
                        # code...
                        $continente = Continente::gCiudadesByContinente();
                        break;
                    case '4':
                        # code...
                        $continente = Continente::gUniversidadesByContinente();
                        break;
                    
                    default:
                        # code...

                        break;
                }
                break;
            case '2':
                switch ($request->get('filtro2')) {
                    case '3':
                        # code...
                        $continente = Pais::gCiudadesByPais();
                        break;

                    case '11':
                        # code...
                        $continente = Pais::gPostulantesByPais();
                        break;  
                    case '3':
                        # code...
                        $continente = Continente::gCiudadesByContinente();
                        break;
                    case '4':
                        # code...
                        $continente = Continente::gUniversidadesByContinente();
                        break;
                    
                    default:
                        # code...

                        break;
                }
                break;
            
            default:
                # code...
                break;
        }



        return response()->json([
                                'content' => $continente
                                ]);
    }


  


}

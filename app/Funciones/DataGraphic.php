<?php namespace App\Funciones;
use App\Continente;
use App\Pais;
use App\Ciudad;
use App\Postulante;
use App\Genero;
use App\TipoEstudio;
use App\Pregrado;
use App\Carrera;
use App\Procedencia;
use App\AnioIntercambio;
use App\PrePostulacionUniversidad;
use App\Postgrado;
use App\Facultad;
use App\Universidad;
use Illuminate\Support\Collection ;
class DataGraphic
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function recursiva($table,$id,$tipo,$sexo)
    {   
        $temp = array();
        switch ($table) {
            case 'continente':
                $breadCrum = "Continente";
                $temp = Continente::all();
                $table = 'pais';
                # code...
                break;
            case 'pais':
                $breadCrum = "País";
                $temp = Pais::where('continente',$id)->get();
                $table = 'ciudad';
                break;
            case 'ciudad':
                $breadCrum = "Ciudad";
                $temp = Ciudad::where('pais',$id)->get();
                $table = 'genero';
                $sexo = "m";

                break;
            case 'genero':
                $breadCrum = "Género";
                $temp = Genero::all();
                $table = 'tipo_estudio';
                $sexo = "f";
                break;
            case 'tipo_estudio':
                $breadCrum = "Tipo de estudio";

                $temp = TipoEstudio::all();
                $table = 'procedencia';
                break;
            case 'procedencia':
                $breadCrum = "Procedencia";

                $temp = Procedencia::all();
                $table = 'fin';
                break;

        }
        $arrayFinal = [];
       // $temp = Pais::all();

        foreach ($temp as $key => $valor) {
            $padre = $valor->id;
            switch ($table) {
                case 'tipo_estudio':
                    $children = $valor->postulanteR->where("ciudad",$id)->count();
                    $nombre = $valor->nombre;
                    $padre = $id;
                    $sexo = $valor->id;
                    break;
                case 'procedencia':
                    $children = $valor->postulanteR->where("ciudad",$id)->where("sexo",$sexo)->count();
                    //dd($valor->postulanteR->where("ciudad",1)->where("sexo",$sexo));
                    $tipo = $valor->id;
                    $nombre = $valor->nombre;
                    $sexo = $sexo;
                    $padre = $id;
                    break;
                case 'fisn':

                    break;
                default:
                    # code...
                    $children = $valor->children;
                    $nombre = $valor->nombre;
                    break;
            }

            if($children){
                    $arrayFinal[] = array(
                                'name'=> $nombre,
                                'breadCrum'=> $breadCrum,
                                'size'=> $children,
                                'children' =>  $this->recursiva($table,$padre,$tipo,$sexo)
                                );               
          
            }
           
        }
        return $arrayFinal;
    }




    public function recursiva_universidad($table,$id,$nombre){   
        $temp = array();
        switch ($table) {
            case 'continente':
                $breadCrum = "Continente";
                $temp = Continente::all();
                $table = 'pais';
                # code...
                break;
            case 'pais':
                $breadCrum = "País";
                $temp = Pais::where('continente',$id)->get();
                $table = 'Convenio';
                # code...
                break;
            case 'Convenio':
                $breadCrum = "Convenio";
                $temp  = Collection::make([["nombre"=>"Si"],["nombre"=>"No"]]);
                $table = 'Universidad';
                # code...
                break;
            case 'Universidad':
                $breadCrum = "Universidad";
                $temp  = Universidad::where('pais',$id)->where('convenio',$nombre)->get();
                $table = 'fin';
              
                # code...
                break;
            
        }
        $arrayFinal = [];
       // $temp = Pais::all();

        foreach ($temp as $key => $valor) {
            switch ($table) {
                case 'Universidad':
                    $nombre = $temp->toArray()[$key]["nombre"];
                    # code...
                    $padre = $id;
                    $children  = Universidad::where('pais',$padre)->where('convenio',$nombre)->count();
                    break;
                
                default:
                    # code...
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    $children = $valor->childrenUniversidad;
                    break;
            }
            
            if($children){
                    $arrayFinal[] = array(
                                'name'=> $nombre,
                                'breadCrum'=> $breadCrum,
                                'size'=> $children,
                                'children' =>  $this->recursiva_universidad($table,$padre,$nombre)
                                );               
          
            }
           
        }
        return $arrayFinal;
    }

    public function recursiva_estudio($table,$id, $procedencia, $tEstudio, $anio){   

       // dd(Universidad::find(1)->probando(1990, 'NO UACH')->get()->count());
       
        $temp = array();
        switch ($table) {
            case 'tipo_estudio':
                $temp = TipoEstudio::all();
                $table = 'procedencia';
                $breadCrum = "Tipo de estudio";
                break;
            case 'procedencia':
                $temp = Procedencia::all();
                $breadCrum = "Procedencia";
                $table = 'año';
                break;
            case 'año':
                $temp = AnioIntercambio::all();
                $breadCrum = "Año de intercambio";
                $table = 'universidad';
                break;
            case 'universidad':
                $temp = Universidad::universidades($id, $procedencia)->get();
                $breadCrum = "Universidad";
                $table = 'facultad';
                break;
            case 'facultad':
                $temp = Universidad::find($id)->facultadR;
                $breadCrum = "Facultad";
                $table = 'carrera';
                break;
            case 'carrera':
                $temp = Facultad::find($id)->carrerasR;
                $breadCrum = "Carrera";

                $table = 'fin';
                break;
         /*
                */
            
            
        }
        $arrayFinal = [];
       // $temp = Pais::all();

        foreach ($temp as $key => $valor) {

            switch ($table) {
                case 'año': // calculo cuantos postulantes son uach  y cuantos postulants son no uach
                    # code...
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    $tEstudio = $nombre;
                    $procedencia = $id;
                    $children = $valor->childrenEstudio($id);
                    break;
                case 'universidad': // calculo cuantos postulants por año existen 
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    if($procedencia === 'Pregrado'){

                        $children = Pregrado::childrenEstudio($padre,$tEstudio)->count();
                    }
                    else{
                        $children = Postgrado::childrenEstudio($padre,$tEstudio)->count();


                    }
                    break;
                case 'facultad':
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    //$children = $valor->childrenEstudio($id, $tEstudio);
                    $anio = $id;
                    $children  = Universidad::postulantes($id,$tEstudio,$valor->id, $procedencia)->count();
                    break;
                case 'carrera':
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    //$children = $valor->childrenEstudio($id, $tEstudio);
                    $children = 0;
                    if($procedencia === 'Pregrado'){

                        $children  = $valor->postulantes($anio,$tEstudio);
                        
                    }
                    
                    
                    break;
                case 'fin':
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    //$children = $valor->childrenEstudio($id, $tEstudio);
                    $children = 0;
                    if($procedencia === 'Pregrado'){

                        $children  = $valor->postulantes($anio,$tEstudio);

                    }
                    
                    
                    break;
                default: // aca calculo el numero de postulantes que son pregrados  y pregrados 
                    # code...
                    $padre = $valor->id;
                    $nombre = $valor->nombre;
                    $children = $valor->childrenEstudio;
                    break;
            }
            
            
            if($children){
                    $arrayFinal[] = array(
                                'name'=> $nombre,
                                'size'=> $children,
                                'breadCrum'=> $breadCrum,
                                'children' =>  $this->recursiva_estudio($table,$padre,$procedencia, $tEstudio, $anio)
                                );               
          
            }
           
        }
        return $arrayFinal;
    }
}
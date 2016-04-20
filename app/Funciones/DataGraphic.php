<?php namespace App\Funciones;
use App\Continente;
use App\Pais;
use App\Ciudad;
use App\Postulante;
use App\Genero;
use App\TipoEstudio;
use App\Pregrado;
use App\Procedencia;
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
                $temp = Continente::all();
                $table = 'pais';
                # code...
                break;
            case 'pais':
                $temp = Pais::where('continente',$id)->get();
                $table = 'ciudad';
                break;
            case 'ciudad':
                $temp = Ciudad::where('pais',$id)->get();
                $table = 'genero';
                $sexo = "m";

                break;
            case 'genero':
                $temp = Genero::all();
                $table = 'tipo_estudio';
                $sexo = "f";
                break;
            case 'tipo_estudio':
                $temp = TipoEstudio::all();
                $table = 'procedencia';
                break;
            case 'procedencia':

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
                                'size'=> $children,
                                'children' =>  $this->recursiva($table,$padre,$tipo,$sexo)
                                );               
          
            }
           
        }
        return $arrayFinal;
    }
}
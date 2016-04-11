<?php namespace App\Funciones;
use App\Continente;
use App\Pais;
use App\Ciudad;
use App\Postulante;
class DataGraphic
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function recursiva($table,$id,$final,$tipo)
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
                break;

            case 'genero':
                $temp = Ciudad::where('id',$id)->get();
                $tipo = 'F';
                $table = 'fin';
                break;
            


           

       
                
        }
        $arrayFinal = [];
       // $temp = Pais::all();
        foreach ($temp as $key => $valor) {
         //   dd($valor->children);

            switch ($tipo) {
                case 'F': //Femenino
                    # code...
                    $children = $valor->children_f;
                    $nombre ='Femenino';
                    if(!$children){
                        $children = $valor->children_m;
                        $nombre ='Masculino';

                    }
                    break;
                
                default:
                    # code...
                    $children = $valor->children;
                    $nombre = $valor->nombre;
                    break;
            }


            if($children){
                if($final){
                    $arrayFinal[] = array(
                                'name'=> $nombre,
                                'size'=> $children,
                                'children' =>  $this->recursiva($table,$valor->id,$final,$tipo)
                                );
                    if($nombre === 'Femenino' and $valor->children_m){
                        $arrayFinal[] = array(
                                'name'=> 'Masculino',
                                'size'=> $valor->children_m,
                                'children' =>  $this->recursiva($table,$valor->id,$final,$tipo)
                                );

                    }



                }
                else{
                    $arrayFinal[] = array(
                                'name'=>$valor->nombre,
                                'size'=>$valor->children
                                );

                }
          
            }
           
        }
        return $arrayFinal;
    }
}
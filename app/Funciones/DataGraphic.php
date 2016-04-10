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
    public function recursiva($table,$id,$children)
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
                $children = 0;
                break;
            case 'genero':
                $temp = Ciudad::where('pais',$id)->get();
                $table = 'tipo_estudi';
                $children = 0;
                break;
                
        }
        $arrayFinal = [];
       // $temp = Pais::all();
        foreach ($temp as $key => $valor) {
         //   dd($valor->children);
  
            if($valor->children){


                if($children){
                    $arrayFinal[] = array(
                                'name'=>$valor->nombre,
                                'size'=>$valor->children,
                                'children' =>  $this->recursiva($table,$valor->id,$children)
                                );
                }
                else{
                    $arrayFinal[] = array(
                                'name'=>$valor->nombre,
                                'size'=>$valor->children
                                );

                }
              
            }
            else{
                break;

            }
        }
        return $arrayFinal;
    }
}

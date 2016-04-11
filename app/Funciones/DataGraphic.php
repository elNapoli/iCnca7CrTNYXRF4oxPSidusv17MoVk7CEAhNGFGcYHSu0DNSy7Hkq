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
    public function recursiva($table,$id,$final)
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
                $final = 0;
                break;
                
       
                
        }
        $arrayFinal = [];
       // $temp = Pais::all();
        foreach ($temp as $key => $valor) {
         //   dd($valor->children);
  
            if($valor->children){
                if($final){
                    $arrayFinal[] = array(
                                'name'=>$valor->nombre,
                                'size'=>$valor->children,
                                'children' =>  $this->recursiva($table,$valor->id,$final)
                                );

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
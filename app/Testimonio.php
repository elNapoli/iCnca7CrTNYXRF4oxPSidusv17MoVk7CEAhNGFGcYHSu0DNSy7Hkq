<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimonio extends Model
{
    protected $table = 'testimonio'; //primary id
    protected $fillable = ['postulante',
                           'cuerpo', 
                           'validado']; 



    //Un Testimonio pertenece a un unic Postulante
    public function postulanteR()
    {
    	return $this->belongsTo('App\Postulante','postulante'); //Id local
    }


    public function getCarreraAttribute(){

    	$tipo =  $this->postulanteR->tipo_estudio;


    	if($tipo ==="Pregrado"){

    		$procedencia = $this->postulanteR->pregradosR->procedencia;
			if($procedencia === "UACH"){

    			return $this->postulanteR->pregradosR->preUachsR->preUEstudioActualesR->carreraR->nombre;


			}
			else{
    			return $this->postulanteR->pregradosR->preNoUachsR->preNuEstudioActualesR->area;

				
			}
    	}
    	else{

    		return $tipo;
    	}
    }

}
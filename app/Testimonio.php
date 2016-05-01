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

}
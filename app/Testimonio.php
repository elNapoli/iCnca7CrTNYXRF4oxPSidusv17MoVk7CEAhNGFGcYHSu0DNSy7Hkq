<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class testimonio extends Model
{
    protected $table = 'testimonio'; //primary id
    public $timestamps = false;
    protected $fillable = ['postulante',
                           'cuerpo', 
                           'foto', 
                           'video']; 



    //Un Testimonio pertenece a un unic Postulante
    public function postulanteR()
    {
    	return $this->belongsTo('App\Postulante','postulante'); //Id local
    }

}
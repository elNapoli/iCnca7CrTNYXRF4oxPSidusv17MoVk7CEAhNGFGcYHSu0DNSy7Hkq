<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistente extends Model
{
    protected $table = 'asistente';
    public $timestamps = false;
    protected $fillable = ['nombre',
                           'postulante',
    					   'indicaciones']; 



    public function detalleBeneficioR()
    {
    	return $this->hasMany('App\DetalleBeneficio','id_a','id'); 
    }

    public function preUachsR()
    {
        return $this->belongsTo('App\PreUach','postulante'); //Id local
    }
}

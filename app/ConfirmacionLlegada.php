<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ConfirmacionLlegada extends Model
{
    protected $table = 'confirmacion_llegada';
    public $timestamps = false;
    protected $fillable = ['fecha_llegada',
    					   'fecha_inicio_curso',
    					   'fecha_termino_curso'];

 

    public function PreUach()
    {
    	return $this->belongsTo('App\PreUach','postulante'); //Id local
    }

}

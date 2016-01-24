<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSolicitudCurso extends Model
{
    protected $table = 'detalle_solicitud_curso';
    public $timestamps = false;
    protected $fillable = ['observaciones',
                           'aceptado',
                           'nombre_encargado'];

 

    public function Asignatura()
    {
    	return $this->belongsTo('App\Asignatura','asignatura'); //Id local
    }

    public function PreNuSolicitudCurso()
    {
    	return $this->belongsTo('App\PreNuSolicitudCurso','solicitud_curso'); //Id local
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetalleSolicitudCurso extends Model
{
    protected $table = 'detalle_solicitud_curso';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['solicitud_curso',
                           'observaciones',
                           'aceptado',
                           'asignatura',
                           'nombre_encargado'];

 

    public function asignaturaR()
    {
      return $this->belongsTo('App\Asignatura','asignatura','codigo'); //Id local
    	//return $this->belongsTo('App\Asignatura',FK en tabla DetalleSolicitudCurso, PK de la tabla Asignatura); //Id local
    }

    public function preNuSolicitudCursoR()
    {
      return $this->belongsTo('App\PreNuSolicitudCurso','solicitud_curso'); //Id local
    }



}

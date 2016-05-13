<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';
    public $timestamps = false;
    protected $fillable = ['nombre',
                           'director',
                           'facultad',
                           'email']; 



    //Una Asignatura pertenece a una unica Carrera
    public function facultadR()
    {
    	return $this->belongsTo('App\Facultad','facultad','id'); //Id local
    }

    //Una Asignatura es requerida en muchas Solicitudes de curso
    public function Asignatura()
    {
        return $this->hasMany('App\Asignatura','carrera', 'id'); //Campo en tabla foranea
    }

    //Una Asignatura se (pendiente)
    public function PrePostUniversidad()
    {
        return $this->hasMany('App\PrePostulacionUniversidad','carrera','id'); //Campo en tabla foranea
    }

    public function PreUEstudioActual()
    {
        return $this->hasMany('App\PreUEstudioActual','postulante'); //Campo en tabla foranea
    }

    public function postulantes($anio, $procedencia){


        return $this->hasMany('App\PrePostulacionUniversidad','carrera','id')
        ->where('pre_postulacion_universidad.anio',$anio)
        ->join('pregrado','pregrado.postulante','=','pre_postulacion_universidad.postulante')
        ->where('pregrado.procedencia',$procedencia)->count();
    }
}

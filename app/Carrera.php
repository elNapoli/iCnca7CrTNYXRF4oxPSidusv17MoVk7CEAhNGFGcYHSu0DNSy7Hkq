<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $table = 'carrera';
    public $timestamps = false;
    protected $fillable = ['nombre',
                           'director',
                           'email']; 



    //Una Asignatura pertenece a una unica Carrera
    public function Facultad()
    {
    	return $this->belongsTo('App\Facultad','facultad'); //Id local
    }

    //Una Asignatura es requerida en muchas Solicitudes de curso
    public function Asignatura()
    {
        return $this->hasMany('App\Asignatura','codigo'); //Campo en tabla foranea
    }

    //Una Asignatura se (pendiente)
    public function PrePostUniversidad()
    {
        return $this->hasMany('App\PrePostUniversidad','id'); //Campo en tabla foranea
    }

    public function PreUEstudioActual()
    {
        return $this->hasMany('App\PreUEstudioActual','postulante'); //Campo en tabla foranea
    }
}

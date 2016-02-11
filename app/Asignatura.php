<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignatura extends Model
{
    protected $table = 'asignatura';
    public $timestamps = false;
    protected $fillable = ['codigo',
                           'nivel',
                           'nombre',
                           'anio',
                           'carrera']; 



    //Una Asignatura pertenece a una unica Carrera
    public function carreraR()
    {
    	return $this->belongsTo('App\Carrera','carrera'); //Id local
    }

    //Una Asignatura es requerida en muchas Solicitudes de curso
    public function DetalleSolicitudCurso()
    {
        return $this->hasMany('App\DetalleSolicitudCurso','asignatura'); //Campo en tabla foranea
    }

    //Una Asignatura se (pendiente)
    public function AsignaturaHomologada()
    {
        return $this->hasMany('App\AsignaturaHomologada','asignatura'); //Campo en tabla foranea
    }
}

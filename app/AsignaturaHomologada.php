<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AsignaturaHomologada extends Model
{
    protected $table = 'asignatura_homologada';
    public $timestamps = false;
    protected $fillable = ['codigo_asignatura_intercambio',
                           'nombre_asignatura_intercambio',
                           'semestre_1',
                           'semestre_2']; 

   

    public function asignaturaR()
    {
    	return $this->belongsTo('App\Asignatura','asignatura'); //Id local
    }

    public function homologacionR()
    {
        return $this->belongsTo('App\Homologacion','homologacion'); //Id local
    }
}

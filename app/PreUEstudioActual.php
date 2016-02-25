<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreUEstudioActual extends Model
{
    protected $table      = 'pre_u_estudio_actual';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['postulante','carrera','anio_ingreso','ranking','beneficios'];

    // un Postulante esta en una ciudad
    public function preUach()
    {
        return $this->belongsTo('App\PreUach','postulante');
    }


    public function carreraR()
    {
        return $this->belongsTo('App\Carrera','carrera');
    }
}

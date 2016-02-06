<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PrePostulacionUniversidad extends Model
{
    protected $table    = 'pre_postulacion_universidad';
    public $timestamps  = false;
    protected $fillable = ['postulante','anio','semestre','desde','hasta','financiamiento','carrera'];

    // un País esta en un Continente
    public function pregrado()
    {
        return $this->belongsTo('App\Pregrado','postulante');
    }

    public function carrera()
    {
        return $this->belongsTo('App\Carrera','carrera');
    }

    public function financiamiento()
    {
        return $this->belongsTo('App\Financiamiento','financiamiento');
    }

    public function preOtroFinanciamientos()
    {
        return $this->hasMany('App\PreOtroFinanciamiento','pre_postulacion_universidad');
    }
}

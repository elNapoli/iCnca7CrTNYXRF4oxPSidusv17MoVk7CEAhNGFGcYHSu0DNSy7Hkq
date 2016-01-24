<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postgrado extends Model
{
    protected $table      = 'postgrado';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['postulante','titulo_profesional','financiamiento'];


    // una postulación de  Postgrado corresponde a un postulante
    public function postulante()
    {
        return $this->belongsTo('App\Postulante','postulante');
    }

    // una postulación de Postgrado puede ser financiado de una forma
    public function financiamiento()
    {
        return $this->belongsTo('App\Financiamiento','financiamiento');
    }

    public function postOtroFinanciamientos()
    {
        return $this->hasMany('App\PostOtroFinanciamiento','postulante');
    }


    public function postPostulacionUniversidades()
    {
        return $this->hasMany('App\PostPostulacionUniversidad','postulante');
    }

    public function maestriaActuales()
    {
        return $this->hasMany('App\MaestriaActual','postulante');
    }

    public function maestriaPostulaciones()
    {
        return $this->hasMany('App\MaestriaPostulacion','postulante');
    }


}

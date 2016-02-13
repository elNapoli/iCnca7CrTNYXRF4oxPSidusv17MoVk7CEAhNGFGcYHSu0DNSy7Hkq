<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreNoUach extends Model
{
    protected $table      = 'pre_no_uach';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['postulante'];
    

    // la postulación que ingresa a la UACh corresponde a un tipo de postulación pregrado
    public function pregrado()
    {
        return $this->belongsTo('App\Pregrado','postulante');
    }

    public function preNuSolicitudCursos()
    {
        return $this->hasMany('App\PreNuSolicitudCurso','postulante');
    }

    public function preNuEstudioActualesR()
    {
        return $this->belongsTo('App\PreNuEstudioActual','postulante','postulante');
    }



}

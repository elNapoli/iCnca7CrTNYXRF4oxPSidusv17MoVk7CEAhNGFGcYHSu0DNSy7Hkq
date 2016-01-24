<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreNuSolicitudCurso extends Model
{
    protected $table   = 'pre_nu_solicitud_curso';
    public $timestamps = false;

    // un Postulante esta en una ciudad
    public function preNoUach()
    {
        return $this->belongsTo('App\PreNoUach','postulante');
    }

    public function detalleSolicitudCursos()
    {
        return $this->hasMany('App\DetalleSolicitudCursos','solicitud_curso');
    }
}

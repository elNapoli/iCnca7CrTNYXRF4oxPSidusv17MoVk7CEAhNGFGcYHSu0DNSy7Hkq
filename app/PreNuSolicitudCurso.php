<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreNuSolicitudCurso extends Model
{
    protected $table   = 'pre_nu_solicitud_curso';
    public $timestamps = false;
    protected $fillable = ['postulante'];

    // un Postulante esta en una ciudad
    public function preNoUach()
    {
        return $this->belongsTo('App\PreNoUach','postulante');
    }

    public function detalleSolicitudCursosR()
    {
        return $this->hasMany('App\DetalleSolicitudCurso','solicitud_curso');
    }
}

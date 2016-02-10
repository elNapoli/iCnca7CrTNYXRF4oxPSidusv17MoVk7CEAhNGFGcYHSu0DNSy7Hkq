<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreNuInscripcionCurso extends Model
{
    protected $table      = 'pre_nu_inscripcion_curso';
    public $timestamps    = false;
    protected $primaryKey = 'detalle_solicitud_curso';
    protected $fillable   = ['profesor'];

    // un Postulante esta en una ciudad
    public function detalleSolicitudCurso()
    {
        return $this->belongsTo('App\DetalleSolicitudCurso','detalle_solicitud_curso');
    }

}

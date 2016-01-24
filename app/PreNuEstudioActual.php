<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreNuEstudioActual extends Model
{
    protected $table      = 'pre_nu_estudio_actual';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['area','anios_cursados','campus_sede'];

    // un Postulante esta en una ciudad
    public function preNoUach()
    {
        return $this->belongsTo('App\PreNoUach','postulante');
    }


    public function campusSede()
    {
        return $this->belongsTo('App\CampusSede','campus_sede');
    }

}

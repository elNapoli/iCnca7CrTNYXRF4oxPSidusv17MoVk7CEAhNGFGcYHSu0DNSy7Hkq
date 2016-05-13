<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MaestriaPostulacion extends Model
{
    protected $table      = 'maestria_postulacion';
    public $timestamps    = false;
    protected $fillable   = ['tipo','duracion','anio','desde','hasta'];
    protected $primaryKey = 'postulante';

    // un Postulante esta en una ciudad
    public function postgrado()
    {
        return $this->belongsTo('App\Postgrado','postulante');
    }

    public function otraMaestrias()
    {
        return $this->hasMany('App\OtraMaestria','postulante');
    }


}

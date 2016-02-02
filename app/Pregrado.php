<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregrado extends Model
{
    protected $table      = 'pregrado';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['procedencia'];


    // una postulación de  Pregrado corresponde a un postulante
    public function postulanteR()
    {
        return $this->belongsTo('App\Postulante','postulante');
    }


    //una postulacion de pregrado  puede poseeer muchas postulaciónes externas
    public function preNoUachs()
    {
        return $this->hasMany('App\PreNoUach','postulante');
    }


    public function prePostulacionUniversidades()
    {
        return $this->hasMany('App\PrePostulacionUniversidad','postulante');
    }

    public function preUachsR()
    {
        return $this->belongsTo('App\PreUach','postulante');
    }
}

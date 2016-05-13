<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pregrado extends Model
{
    protected $table      = 'pregrado';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['postulante','procedencia'];


    // una postulación de  Pregrado corresponde a un postulante
    public function postulanteR()
    {
        return $this->belongsTo('App\Postulante','postulante');
    }


    //una postulacion de pregrado  puede poseeer muchas postulaciónes externas
    public function preNoUachsR()
    {
        return $this->belongsTo('App\PreNoUach','postulante','postulante');
    }


    public function prePostulacionUniversidadesR()
    {
        return $this->belongsTo('App\PrePostulacionUniversidad','postulante','postulante');
    }

    public function preUachsR()
    {
        return $this->belongsTo('App\PreUach','postulante','postulante');
    }

    public function scopeChildrenEstudio($query,$anio, $procedencia){

        return $query->whereHas('prePostulacionUniversidadesR', function($q) use($anio) {
                        $q->where('anio', $anio);
                    })->where('procedencia',$procedencia)->get();

    }

}

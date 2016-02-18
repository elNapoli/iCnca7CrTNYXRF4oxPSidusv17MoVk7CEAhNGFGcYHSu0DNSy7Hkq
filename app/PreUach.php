<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreUach extends Model
{
    protected $table      = 'pre_uach';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['postulante',
                            'email_institucional',
                            'grupo_sanguineo',
                            'enfermedades',
                            'telefono',
                            'ciudad',
                            'direccion'];

    // un Postulante esta en una ciudad
    public function pregradoR()
    {
        return $this->belongsTo('App\Pregrado','postulante','postulante');
    }

    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad','ciudad');
    }

    public function cindas()
    {
        return $this->hasMany('App\Cinda','postulante');
    }


    public function confirmacionLlegadas()
    {
        return $this->hasMany('App\ConfirmacionLlegada','postulante');
    }

    public function contectoExtranjeros()
    {
        return $this->hasMany('App\ContactoExtranjero','postulante');
    }

    public function homologacionesR()
    {
        return $this->hasMany('App\Homologacion','postulante');
    }

     public function preUEstudioActualesR()
    {
        return $this->belongsTo('App\PreUEstudioActual','postulante','postulante');
    }

    public function preURespnsables()
    {
        return $this->hasMany('App\PreUResponsable','postulante');
    }


    public function asistentesR()
    {
        return $this->belongsTo('App\Asistente','postulante','postulante');
    }




}

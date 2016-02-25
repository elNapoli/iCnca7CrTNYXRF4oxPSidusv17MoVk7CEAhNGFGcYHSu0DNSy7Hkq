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

    public function ciudadR()
    {
        return $this->belongsTo('App\Ciudad','ciudad');
    }

    public function cindas()
    {
        return $this->hasMany('App\Cinda','postulante');
    }


    public function confirmacionLlegadaR()
    {
        return $this->belongsTo('App\ConfirmacionLlegada','postulante');
    }

    public function contactoExtranjeroR()
    {
        return $this->belongsTo('App\ContactoExtranjero','postulante');
    }

    public function homologacionesR()
    {
        return $this->hasMany('App\Homologacion','postulante');
    }

     public function preUEstudioActualesR()
    {
        return $this->belongsTo('App\PreUEstudioActual','postulante','postulante');
    }

    public function preURespnsablesR()
    {
        return $this->hasMany('App\PreUResponsable','postulante','postulante');
    }


    public function asistentesR()
    {
        return $this->belongsTo('App\Asistente','postulante','postulante');
    }

        public function declaracionR()
    {
        return $this->belongsTo('App\Declaracion','postulante','postulante');
    }



}

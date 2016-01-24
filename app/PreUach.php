<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreUach extends Model
{
    protected $table      = 'pre_uach';
    public $timestamps    = false;
    protected $primaryKey = 'postulante';
    protected $fillable   = ['email_institucional',
                            'grupo_sanguineo',
                            'enfermedades',
                            'telefono',
                            'ciudad',
                            'direccion'];

    // un Postulante esta en una ciudad
    public function pregrado()
    {
        return $this->belongsTo('App\Pregrado','postulante');
    }

    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad','ciudad');
    }

    public function cidas()
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

    public function homologaciones()
    {
        return $this->hasMany('App\Homologacion','postulante');
    }

     public function preUEstudioActuales()
    {
        return $this->hasMany('App\PreUEstudioActual','postulante');
    }

    public function preURespnsables()
    {
        return $this->hasMany('App\PreUResponsable','postulante');
    }


    public function asistentes()
    {
        return $this->hasMany('App\Asistente','postulante');
    }




}

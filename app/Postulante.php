<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table    = 'postulante';
    public $timestamps  = false;
    protected $fillable = ['apellido_paterno',
                            'apellido_materno',
                            'nombre',
                            'sexo',
                            'nacionalidad',
                            'fecha_nacimiento',
                            'lugar_nacimiento',
                            'telefono',
                            'email_personal',
                            'ciudad',
                            'tipo_estudio',
                            'direccion'];

    // un Postulante esta en una ciudad
    public function ciudad()
    {
        return $this->belongsTo('App\Ciudad','ciudad');
    }

    public function postgrados()
    {
        return $this->hasMany('App\Postgrado','postulante');
    }

    public function pregrados()
    {
        return $this->hasMany('App\Pregrado','postulante');
    }


    public function documentoIdentidades()
    {
        return $this->hasMany('App\DocumentoIdentidad','postulante');
    }

    public function documentoAdjuntos()
    {
        return $this->hasMany('App\DocumentoAdjunto','postulante');
    }







}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Postulante extends Model
{
    protected $table    = 'postulante';
    protected $primaryKey = 'id';
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


    public function ciudadR()
    {
        return $this->belongsTo('App\Ciudad','ciudad');
    }

    public function postgradosR()
    {
        return $this->belongsTo('App\Postgrado','id','postulante');
    }

    public function pregradosR()
    {
        return $this->belongsTo('App\Pregrado','id','postulante');  //local , Remota
    }                                            

    public function documentoIdentidadR()
    {
        return $this->hasMany('App\DocumentoIdentidad','postulante');
    }

    public function documentoAdjuntos()
    {
        return $this->hasMany('App\DocumentoAdjunto','postulante');
    }



}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CampusSede extends Model
{
    protected $table = 'campus_sede';
    public $timestamps = false;
    protected $fillable = ['nombre',
                           'telefono',
                           'fax',
                           'sitio_web',
                           'universidad',
                           'ciudad']; 


	########### N:1 ########### 					   

    //Un Campus o Sede pertenece a una universidad
    public function universidadR()
    {
    	return $this->belongsTo('App\Universidad','universidad','id');
    }

    //Un Campus o Sede se encuentra en una ciudad
    public function ciudadR()
    {
    	return $this->belongsTo('App\Ciudad','ciudad');
    }

    ########### 1:N ###########

    //Un Campus o Sede tiene 1 o mas facultades
    public function facultadR()
    {
    	return $this->hasMany('App\Facultad','campus_sede'); //Campo en tabla foranea
    }

    //Un Campus o Sede tiene 1 o mas departamentos

    public function departamentosR()

    {
    	return $this->hasMany('App\Departamento','campus_sede'); //Campo en tabla foranea
    }

    public function PostPostulacionUniversidad()
    {
        return $this->hasMany('App\PostPostulacionUniversidad','campus_sede'); //Campo en tabla foranea
    }

    public function PreNuEstudioActual()
    {
        return $this->hasMany('App\PreNuEstudioActual','campus_sede'); //Campo en tabla foranea
    }
}


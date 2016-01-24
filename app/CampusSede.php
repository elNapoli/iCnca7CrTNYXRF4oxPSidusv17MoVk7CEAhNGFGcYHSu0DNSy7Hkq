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
                           'sitio_web']; 


	########### N:1 ########### 					   

    //Un Campus o Sede pertenece a una universidad
    public function Universidad()
    {
    	return $this->belongsTo('App\Universidad','universidad');
    }

    //Un Campus o Sede se encuentra en una ciudad
    public function Ciudad()
    {
    	return $this->belongsTo('App\Ciudad','ciudad');
    }

    ########### 1:N ###########

    //Un Campus o Sede tiene 1 o mas facultades
    public function Facultad()
    {
    	return $this->hasMany('App\Facultad','campus_sede'); //Campo en tabla foranea
    }

    //Un Campus o Sede tiene 1 o mas departamentos
    public function Departamento()
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


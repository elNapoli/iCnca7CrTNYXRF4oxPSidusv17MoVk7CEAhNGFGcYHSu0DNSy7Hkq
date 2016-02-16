<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facultad extends Model
{
    protected $table = 'facultad';
    public $timestamps = false;
    protected $fillable = ['nombre',
    					   'telefono',
    					   'campus_sede'];

 

    public function campusSedesR()
    {
    	return $this->belongsTo('App\CampusSede','campus_sede','id'); //Id local
    }

    public function carrerasR()
    {
    	return $this->hasMany('App\Carrera','id'); //Id local
    }


}

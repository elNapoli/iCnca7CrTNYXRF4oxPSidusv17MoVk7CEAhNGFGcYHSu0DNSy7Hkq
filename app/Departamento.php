<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    public $timestamps = false;
    protected $fillable = ['tipo',
                           'sitio_web',
                           'nombre_encargado',
                           'telefono',
                           'email'];

 

    public function campusSedeR()
    {
    	return $this->belongsTo('App\CampusSede','id'); //Id local
    }

}

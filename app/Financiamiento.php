<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Financiamiento extends Model
{
    protected $table = 'financiamiento';
    public $timestamps = false;
    protected $fillable = ['nombre'];

 

    public function postgrados()
    {
        return $this->hasMany('App\Postgrado','financiamiento'); // nombre del campo en la otra tabla 
    }

    public function prePostulacionUniversidad()
    {
        return $this->hasMany('App\PrePostulacionUniversidad','financiamiento'); // nombre del campo en la otra tabla 
    }
}

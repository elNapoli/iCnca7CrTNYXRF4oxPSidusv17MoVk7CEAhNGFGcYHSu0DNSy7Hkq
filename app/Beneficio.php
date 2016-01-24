<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Beneficio extends Model
{
    protected $table = 'beneficio';
    public $timestamps = false;
    protected $fillable = ['nombre'];



    public function Asistente()
    {
    	return $this->hasMany('App\Asistente','beneficio'); //Campo en tabla foranea
    }

}

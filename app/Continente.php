<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Continente extends Model
{
    protected $table = 'continente';
    public $timestamps = false;
    protected $fillable = ['nombre'];

    public function Pais()
    {
    	return $this->hasMany('App\Pais','id'); //Campo en tabla foranea
    }

}
